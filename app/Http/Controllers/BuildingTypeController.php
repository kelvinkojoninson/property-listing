<?php

namespace App\Http\Controllers;

use App\Models\BuildingTypes;
use App\Models\Logs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class BuildingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BuildingTypes::where('deleted', 0)->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => $data
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
                'description' => 'required|unique:tblbuilding_types',
            ],
            [
                // description error messages
                "description.required" => "No description supplied",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Adding building type failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                $insertID = BuildingTypes::insertGetId([
                    'description' => $request->description,
                    "createdate" =>  date("Y-m-d H:i:s"),
                    "createuser" =>  $request->createuser,
                ]);

                $userIp = $request->ip();
                $locationData = Location::get($userIp);
                $transid = strtoupper(bin2hex(random_bytes(4)));

                Logs::insert([
                    "userid" => $transid,
                    "module" => "Building Types",
                    "action" => "Building type added from Back Office with id {$insertID}",
                    "ipaddress" => $userIp,
                    "createuser" =>  $transid,
                    "createdate" => date("Y-m-d H:i:s"),
                    "longitude" => $locationData->longitude ?? $userIp,
                    "latitude" => $locationData->latitude ?? $userIp,
                ]);
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Record added successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while adding building type, please contact admin",
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
                'transid' => 'required',
                'description' => 'required',
            ],
            [
                // description error messages
                "transid.required" => "No id supplied",
                "description.required" => "No description supplied",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Update failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        $industry = BuildingTypes::where("description", $request->description)
            ->where("deleted", 0)
            ->where("transid", "!=", $request->transid)
            ->first();

        if (!empty($industry)) {
            return response()->json([
                "ok" => false,
                "msg" => "Record already exists"
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                $industry = BuildingTypes::where("transid", $request->transid)
                    ->where("deleted", 0)->first();

                if (empty($industry)) {
                    return response()->json([
                        "ok" => false,
                        "msg" => "Unknown code supplied",
                    ]);
                }

                $industry->update([
                    'description' => $request->description,
                    "modifydate" =>  date("Y-m-d H:i:s"),
                    "modifyuser" =>  $request->createuser,
                ]);

                $userIp = $request->ip();
                $locationData = Location::get($userIp);
                $transid = strtoupper(bin2hex(random_bytes(4)));

                Logs::insert([
                    "userid" => $transid,
                    "module" => "Building Type",
                    "action" => "Building type updated from Back office - {$request->transid}",
                    "ipaddress" => $userIp,
                    "createuser" =>  $request->createuser,
                    "createdate" => date("Y-m-d H:i:s"),
                    "longitude" => $locationData->longitude ?? $userIp,
                    "latitude" => $locationData->latitude ?? $userIp,
                ]);
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Record updated successfully",
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

    public function deleteBuildingType(Request $request)
    {
        $record = BuildingTypes::find($request->transid);

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

        $userIp = $request->ip();
        $locationData = Location::get($userIp);
        $transid = strtoupper(bin2hex(random_bytes(4)));

        Logs::insert([
            "userid" => $transid,
            "module" => "Building Type",
            "action" => "Deleted building type from Back office with id {$request->transid}",
            "ipaddress" => $userIp,
            "createuser" =>  $request->createuser,
            "createdate" => date("Y-m-d H:i:s"),
            "longitude" => $locationData->longitude ?? $userIp,
            "latitude" => $locationData->latitude ?? $userIp,
        ]);

        return response()->json([
            "ok" => true,
            "msg" => "Delete successful",
        ]);
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
}
