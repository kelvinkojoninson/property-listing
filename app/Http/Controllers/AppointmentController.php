<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppointmentResource;
use App\Models\Appointments;
use App\Models\Logs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Appointments::where('deleted', 0)->orderByDesc('createdate')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => AppointmentResource::collection($data)
        ]);
    }

    public function appointments($user, $dateFrom, $dateTo)
    {
        $data = Appointments::where('deleted', 0)
        ->when($user !== 'all', function ($q)  use ($user) {
            return $q->where('createuser', $user);
        })
        ->whereBetween('meeting_date', [$dateFrom, $dateTo])
        ->orderByDesc('createdate')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => AppointmentResource::collection($data)
        ]);
    }

    public function trash($user, $dateFrom, $dateTo)
    {
        $data = Appointments::where('deleted', 1)
        ->when($user !== 'all', function ($q)  use ($user) {
            return $q->where('createuser', $user);
        })
        ->whereBetween('meeting_date', [$dateFrom, $dateTo])
        ->orderByDesc('createdate')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => AppointmentResource::collection($data)
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
                'clientName' => 'required',
                'title' => 'required',
                'meetingDate' => 'required',
                'status' => 'required',
            ],
            [
                // client name error messages
                "clientName.required" => "No client supplied",

                // Title error messages
                "title.required" => "No title selected",

                // meeting date error messages
                "meetingDate.required" => "No date supplied",

                // Status error messages
                "status.required" => "No status selected",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Scheduling appointment failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                Appointments::insert([
                    'customer_id' => $request->clientName,
                    'title' => $request->title,
                    'meeting_date' => $request->meetingDate,
                    'venue' => $request->venue,
                    'status' => $request->status,
                    'description' => $request->description,
                    "createdate" =>  date("Y-m-d H:i:s"),
                    "createuser" =>  $request->createuser
                ]);
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Appointment scheduled successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while scheduling appointment, please contact admin",
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
                'clientName' => 'required',
                'title' => 'required',
                'meetingDate' => 'required',
                'status' => 'required',
            ],
            [
                // userid error messages
                "transid.required" => "No id supplied",

                // client name error messages
                "clientName.required" => "No client supplied",

                // Title error messages
                "title.required" => "No title selected",

                // meeting date error messages
                "meetingDate.required" => "No date supplied",

                // Status error messages
                "status.required" => "No status selected",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Updating appointment failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                $appointment = Appointments::where("transid", $request->transid)
                    ->where("deleted", 0)->first();

                if (empty($appointment)) {
                    return response()->json([
                        "ok" => false,
                        "msg" => "Unknown code supplied",
                    ]);
                }

                $appointment->update([
                    'customer_id' => $request->clientName,
                    'title' => $request->title,
                    'meeting_date' => $request->meetingDate,
                    'venue' => $request->venue,
                    'status' => $request->status,
                    'description' => $request->description,
                    "modifydate" =>  date("Y-m-d H:i:s"),
                    "modifyuser" =>  $request->createuser
                ]);
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Appointment updated successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while updating appointment, please contact admin",
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

    public function deleteAppointment(Request $request)
    {
        $record = Appointments::find($request->transid);

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

    public function restoreAppointment(Request $request)
    {
        $record = Appointments::find($request->transid);

        if (empty($record)) {
            return response()->json([
                "ok" => false,
                "msg" => "Unknown code supplied",
            ]);
        }

        $updated = $record->update([
            "deleted" => 0,
        ]);

        if (!$updated) {
            return response()->json([
                "ok" => false,
                "msg" => "Restore failed",
            ]);
        }

        return response()->json([
            "ok" => true,
            "msg" => "Restore successful",
        ]);
    }
}
