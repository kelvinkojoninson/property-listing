<?php

namespace App\Http\Controllers;

use App\Http\Resources\TenantPropertyResource;
use App\Http\Resources\TenantResource;
use App\Models\Bookings;
use App\Models\Payments;
use App\Models\Properties;
use App\Models\Tenant;
use App\Models\TenantProperty;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletHistory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('deleted', 0)->where('role', 'tenant')
            ->orderByDesc('createdate')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => TenantResource::collection($data)
        ]);
    }

    public function properties($tenantID, $property)
    {
        $data = TenantProperty::when($tenantID !== 'all', function ($q)  use ($tenantID) {
            return $q->where('tenant_id', $tenantID);
        })->when($property !== 'all', function ($q)  use ($property) {
            return $q->where('property_id', $property);
        })->where('deleted', 0)
        ->orderByDesc('createdate')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => TenantPropertyResource::collection($data)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
    }

    public function assignProperty(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'userid' => 'required',
                'property' => 'required',
                'status' => 'required',
                'dateOccupied' => 'required',
            ],
            [
                "userid.required" => "No user selected",
                "dateOccupied.required" => "No date selected",
                "property.required" => "No property selected",
                "status.required" => "No status selected",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Assignment failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        // Check balance
        $property =  Properties::select('price')->where("transid", $request->property)->first();
        $balance = WalletHistory::where('userid', $request->userid)->sum('amount');
         if ($balance < $property->price) {
                return response()->json([
                    "ok" => false,
                    "msg" => "Wallet balance is low. Tenant must top up wallet to at least a weeks rent or sale amount. Minimum balance required is !".$property->price
                ]);
            } 

        $tenant = TenantProperty::where('tenant_id', $request->userid)
        ->where('property_id', $request->property)
        ->where('status', 0)
        ->where('deleted', 0)->first();

        if($tenant){
                return response()->json([
                    "ok" => false,
                    "msg" => "This property has been already been assigned to this tenant!"
                ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request, $property) {
                TenantProperty::insert([
                    'tenant_id' => $request->userid,
                    'property_id' => $request->property,
                    'date_occupied' => $request->dateOccupied,
                    'status' => $request->status,
                    "createdate" =>  date("Y-m-d H:i:s"),
                    "createuser" =>  $request->createuser
                ]);

                Bookings::where('booking_code', $request->bookingCode)
                ->where('userid', $request->userid)->where('deleted', 0)->update([
                    'is_approved' => 0,
                ]);

                $wallet = Wallet::firstOrCreate([
                    'userid' => $request->userid,
                ], [
                    'wallet_id' => "WA" . strtoupper(bin2hex(random_bytes(5))),
                    'userid' => $request->userid,
                ]);

                WalletHistory::create([
                    "transid" => "TR" . strtoupper(bin2hex(random_bytes(5))),
                    "userid" => $request->userid,
                    "wallet_id" => $wallet->wallet_id,
                    "amount" => -$property->price,
                    "currency" => "GHS",
                    "reference" => json_encode($request->bookingCode),
                    "transtype" => "credit",
                    "channel" => 'wallet',
                    "ifo" => "Property ID: $request->property",
                ]);

                Payments::insert([
                    "transid" => strtoupper(bin2hex(random_bytes(5))),
                    "property_id" => $request->property,
                    "userid" => $request->userid,
                    "amount_due" => $property->price,
                    "amount_paid" => $property->price,
                    "balance" => 0,
                    "payment_mode" => 'WALLET',
                    "reference" =>  date("Y-m-d"),
                    "createdate" =>  date("Y-m-d H:i:s"),
                    "createuser" =>  $request->createuser
                ]);
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Property assigned successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while assigning property, please contact admin",
                "error" => [
                    "msg" => $e->__toString(),
                    "fix" => "Please complete all required fields",
                ]
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
    }

    public function updateAssignProperty(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'transid' => 'required',
                'tenant' => 'required',
                'property' => 'required',
                'status' => 'required',
            ],
            [
                "transid.required" => "No id supplied",
                "tenant.required" => "No tenant selected",
                "property.required" => "No property selected",
                "status.required" => "No status selected",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Update failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        $check = TenantProperty::where("tenant_id", $request->tenant)
        ->where("property_id", $request->property)
        ->where("deleted", 0)
        ->where("status", 1)
        ->first();

        if (!empty($check)) {
            return response()->json([
                "ok" => false,
                "msg" => "Tenant is already associated with this property!"
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                $assign = TenantProperty::find($request->transid);

                if (empty($assign)) {
                    return response()->json([
                        "ok" => false,
                        "msg" => "Unknown code supplied",
                    ]);
                }

                $assign->update([
                    'tenant_id' => $request->tenant,
                    'property_id' => $request->property,
                    'status' => $request->status,
                    "modifydate" =>  date("Y-m-d H:i:s"),
                    "modifyuser" =>  $request->createuser
                ]);
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Property assignment updated successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while updating record, please contact admin",
                "error" => [
                    "msg" => $e->__toString(),
                    "fix" => "Please complete all required fields",
                ]
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteTenantProperty(Request $request)
    {
        $record = TenantProperty::find($request->transid);

        if (empty($record)) {
            return response()->json([
                "ok" => false,
                "msg" => "Unknown code supplied",
            ]);
        }

        $updated = $record->update([
            "deleted" => 1,
        ]);

        if (!$updated) {
            return response()->json([
                "ok" => false,
                "msg" => "Delete failed",
            ]);
        }

        return response()->json([
            "ok" => true,
            "msg" => "Delete successful",
        ]);
    }
}
