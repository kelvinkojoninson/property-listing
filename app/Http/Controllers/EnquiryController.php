<?php

namespace App\Http\Controllers;

use App\Http\Resources\EnquiryResource;
use App\Models\Enquiry;
use App\Models\Logs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function enquiries($dateFrom, $dateTo)
    {
        $data = Enquiry::where('deleted', 0)
            ->whereBetween('createdate', [$dateFrom, $dateTo])
            ->orderByDesc('createdate')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => EnquiryResource::collection($data)
        ]);
    }

    public function trash($dateFrom, $dateTo)
    {
        $data = Enquiry::where('deleted', 1)
            ->whereBetween('createdate', [$dateFrom, $dateTo])
            ->orderByDesc('createdate')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => EnquiryResource::collection($data)
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
                'propertyID' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'message' => 'required',
                'email' => 'required|string|email|max:255',
            ],
            [
                // userid error messages
                "propertyID.required" => "No property ID supplied",

                // userid error messages
                "name.required" => "No first name supplied",

                // Title error messages
                "phone.required" => "No phone number supplied",

                // meeting date error messages
                "email.required" => "No email supplied",

                'message.required' => 'No message supplied',

                // meeting date error messages
                "email.email" => "Please enter a valid email",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Sending enquiry failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                Enquiry::create([
                    'property_id' => $request->propertyID,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'message' => $request->message,
                    'status' => 1,
                    "createdate" =>  date("Y-m-d H:i:s"),
                    "createuser" =>  ''
                ]);
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Enquiry sent successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while sending enquiry, please contact admin",
                "error" => [
                    "msg" => $e->__toString(),
                    "fix" => "Please complete all required fields",
                ]
            ]);
        }
    }

    public function sendMessage(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'subject' => 'required',
                'message' => 'required',
                'email' => 'required|string|email|max:255',
            ],
            [
                "name.required" => "No name supplied",
                "subject.required" => "No subject supplied",
                "email.required" => "No email supplied",
                'message.required' => 'No message supplied',
                "email.email" => "Please enter a valid email",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Sending message failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {

                $data = array();

                Mail::send([], $data, function ($message) use ($request) {
                    $message->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_ADDRESS'))
                        ->subject($request->subject)
                        ->setBody($request->message);

                    $message->from($request->email, $request->name);
                });
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Message sent successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while sending message, please contact admin",
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
                'enquiryID' => 'required',
                'status' => 'required',
            ],
            [
                "enquiryID.required" => "No enquiry ID supplied",
                "status.required" => "No status supplied",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Updating enquiry failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                $enquiry = Enquiry::find($request->enquiryID);

                if (empty($enquiry)) {
                    return response()->json([
                        "ok" => false,
                        "msg" => "Unknown code supplied",
                    ]);
                }

                $enquiry->update([
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
                "msg" => "Enquiry updated successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while updating enquiry, please contact admin",
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

    public function deleteEnquiry(Request $request)
    {
        $record = Enquiry::find($request->transid);

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
