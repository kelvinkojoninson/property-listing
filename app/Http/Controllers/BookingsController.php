<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\Bookings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bookings::where('deleted', 0)->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => BookingResource::collection($data)
        ]);
    }

    public function bookings($user, $property, $dateFrom, $dateTo)
    {
        $data = Bookings::where('deleted', 0)
        ->when($user !== 'all', function ($q)  use ($user) {
            return $q->where('createuser', $user);
        })
        ->when($property !== 'all', function ($q)  use ($property) {
            return $q->where('property_id', $property);
        })
        ->whereBetween('createdate', [$dateFrom, $dateTo])->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => BookingResource::collection($data)
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
        $validator = Validator::make(
            $request->all(),
            [
                'property' => 'required',
                'userid' => 'required',
                'ifo' => 'required',
                'occupants_no' => 'required|numeric',
            ],
            [
                // userid error messages
                "property.required" => "No property ID supplied",

                // userid error messages
                "userid.required" => "No userid supplied",

                // Title error messages
                "ifo.required" => "Book For is required!",

                // meeting date error messages
                "occupants_no.required" => "Occupants number is required!",
                "occupants_no.numeric" => "Occupants number must be numeric!",


            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Booking  failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                Bookings::insert([
                    'booking_code' => 'BK' . strtoupper(bin2hex(random_bytes(4))),
                    'property_id' => $request->property,
                    'userid' => $request->userid,
                    'ifo' => $request->ifo,
                    'ifo_name' => $request->ifo_name,
                    'ifo_phone' => $request->ifo_phone,
                    'occupants_no' => $request->occupants_no,
                    "createdate" =>  date("Y-m-d H:i:s"),
                    "createuser" =>  $request->userid
                ]);
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Booked successfully!",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while booking property, please contact admin",
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
        $validator = Validator::make(
            $request->all(),
            [
                'bookingCode' => 'required',
                'property' => 'required',
                'userid' => 'required',
                'ifo' => 'required',
                'occupants_no' => 'required|numeric',
                'status' => 'required',
            ],
            [
                // userid error messages
                "property.required" => "No property ID supplied",

                // userid error messages
                "userid.required" => "No userid supplied",

                // Title error messages
                "ifo.required" => "Book For is required!",

                // meeting date error messages
                "occupants_no.required" => "Occupants number is required!",
                "occupants_no.numeric" => "Occupants number must be numeric!",

                "bookingCode.required" => "No booking code supplied",

                "status.required" => "No status supplied",

            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Booking update failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                $booking = Bookings::where('booking_code', $request->bookingCode)->where('userid', $request->userid)->where('deleted', 0)->first();
                $booking->update([
                    'ifo' => $request->ifo,
                    'ifo_name' => $request->ifo_name,
                    'ifo_phone' => $request->ifo_phone,
                    'occupants_no' => $request->occupants_no,
                    'status' => $request->status,
                    "modifydate" =>  $request->status == 0 ? date("Y-m-d H:i:s") : NULL,
                    "modifyuser" =>  $request->status == 0 ? $request->userid : ''
                ]);
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Booking updated successfully!",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while updating, please contact admin",
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

    public function deleteBooking(Request $request)
    {
        $record = Bookings::where('booking_code',$request->bookingCode)->first();

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
