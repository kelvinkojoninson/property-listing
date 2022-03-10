<?php

namespace App\Http\Controllers;

use App\Http\Resources\AgentPropertyResource;
use App\Http\Resources\AgentsResource;
use App\Models\AgentProperty;
use App\Models\Agents;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Agents::where('deleted', 0)
            ->orderByDesc('createdate')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => AgentsResource::collection($data)
        ]);
    }

    public function properties($agentID)
    {
        $data = AgentProperty::when($agentID !== 'all', function ($q)  use ($agentID) {
            return $q->where('agent_id', $agentID);
        })->where('deleted', 0)
        ->orderByDesc('createdate')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => AgentPropertyResource::collection($data)
        ]);
    }

    public function trash()
    {
        $data = Agents::where('deleted', 1)->orderByDesc('createdate')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successfulhh',
            'data' => AgentsResource::collection($data)
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
                'firstName' => 'required',
                'lastName' => 'required',
                'phoneNumber' => 'required',
                'email' => 'required|string|email|max:255|unique:tblusers',
                "image" => "image|mimes:jpeg,png,jpg|max:2048",
            ],
            [
                // userid error messages
                "firstName.required" => "No first name supplied",

                // client name error messages
                "lastName.required" => "No last name supplied",

                // Title error messages
                "phone.required" => "No phone number supplied",

                // meeting date error messages
                "email.required" => "No email supplied",
                
                // meeting date error messages
                "email.email" => "Please enter a valid email",

                // meeting date error messages
                "email.unique" => "Email is already taken",

                // Image error messages
                "profile_avatar.image" => "Uploaded file must be an image",
                "profile_avatar.mimes" => "Uploaded file must have a jpeg, png, jpg extension",
                "profile_avatar.max" => "Uploaded file must size should not be more than 2MB",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Registering agent failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                $transid = strtoupper(bin2hex(random_bytes(4)));

                User::create([
                    'userid' => $transid,
                    'fname' => $request->firstName,
                    'lname' => $request->lastName,
                    'email' => $request->email,
                    'phone' => $request->phoneNumber,
                    'username' => str_replace(' ', '_', strtolower(substr($request->firstName, 0, 4)) . $transid),
                    'password' => Hash::make('12345678'),
                    'role' => 'agent',
                    "createdate" =>  date("Y-m-d H:i:s"),
                    "createuser" =>  $request->createuser
                ]);

                Agents::insert([
                    'userid' => $transid,
                    'fname' => $request->firstName,
                    'lname' => $request->lastName,
                    'mname' => $request->middleName,
                    'email' => $request->email,
                    'phone' => $request->phoneNumber,
                    'phone2' => $request->phoneNumber2,
                    'approved' => $request->approved,
                    'username' => str_replace(' ', '_', strtolower(substr($request->firstName, 0, 4)) . $transid),
                    "createdate" =>  date("Y-m-d H:i:s"),
                    "createuser" =>  $request->createuser
                ]);

                if ($request->hasfile('image')) {
                    $filePath = $request->file('image')->store("public/avatars");

                    $name = env("APP_URL") . "/" . str_replace("public", "storage", $filePath);

                    Agents::where("userid", $transid)->update([
                        "picture" => $name,
                    ]);

                    User::where("userid", $transid)->update([
                        "picture" => $name,
                    ]);
                }
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Agent registered successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while registering agent, please contact admin",
                "error" => [
                    "msg" => $e->__toString(),
                    "fix" => "Please complete all required fields",
                ]
            ]);
        }
    }


    public function assignProperty(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'agent' => 'required',
                'property' => 'required',
                'status' => 'required',
            ],
            [
                "agent.required" => "No agent selected",
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

        try {
            $transResult = DB::transaction(function () use ($request) {
                AgentProperty::insert([
                    'agent_id' => $request->agent,
                    'property_id' => $request->property,
                    'status' => $request->status,
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
        $validator = Validator::make(
            $request->all(),
            [
                'transid' => 'required',
                'userid' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'phoneNumber' => 'required',
                'email' => 'required|string|email|max:255',
                "image" => "image|mimes:jpeg,png,jpg|max:2048",
            ],
            [
                // userid error messages
                "userid.required" => "No userid supplied",

                // userid error messages
                "firstName.required" => "No first name supplied",

                // client name error messages
                "lastName.required" => "No last name supplied",

                // Title error messages
                "phone.required" => "No phone number supplied",

                // meeting date error messages
                "email.required" => "No email supplied",

                // meeting date error messages
                "email.email" => "Please enter a valid email",

                // Image error messages
                "profile_avatar.image" => "Uploaded file must be an image",
                "profile_avatar.mimes" => "Uploaded file must have a jpeg, png, jpg extension",
                "profile_avatar.max" => "Uploaded file must size should not be more than 2MB",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Updating agent failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        $email = User::where("email", $request->email)
            ->where("deleted", 0)
            ->where("userid", "!=", $request->userid)
            ->first();

        if (!empty($email)) {
            return response()->json([
                "ok" => false,
                "msg" => "Email is already taken"
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                $user = User::where("userid", $request->userid)
                    ->where("deleted", 0)->first();

                if (empty($user)) {
                    return response()->json([
                        "ok" => false,
                        "msg" => "Unknown code supplied",
                    ]);
                }

                $user->update([
                    'fname' => $request->firstName,
                    'lname' => $request->lastName,
                    'email' => $request->email,
                    'phone' => $request->phoneNumber,
                    "modifydate" =>  date("Y-m-d H:i:s"),
                    "modifyuser" =>  $request->createuser
                ]);

                $agent = Agents::where("userid", $request->userid)
                    ->where("deleted", 0)->first();

                $agent->update([
                    'fname' => $request->firstName,
                    'lname' => $request->lastName,
                    'mname' => $request->middleName,
                    'email' => $request->email,
                    'phone' => $request->phoneNumber,
                    'phone2' => $request->phoneNumber2,
                    "modifydate" =>  date("Y-m-d H:i:s"),
                    "modifyuser" =>  $request->createuser
                ]);

                if ($request->hasfile('image')) {
                    $filePath = $request->file('image')->store("public/avatars");

                    $name = env("APP_URL") . "/" . str_replace("public", "storage", $filePath);

                    Agents::where("userid", $agent->userid)->update([
                        "picture" => $name,
                    ]);

                    User::where("userid", $user->userid)->update([
                        "picture" => $name,
                    ]);
                }
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Agent updated successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while updating agent, please contact admin",
                "error" => [
                    "msg" => $e->__toString(),
                    "fix" => "Please complete all required fields",
                ]
            ]);
        }
    }

    public function updateAssignProperty(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'transid' => 'required',
                'agent' => 'required',
                'property' => 'required',
                'status' => 'required',
            ],
            [
                "transid.required" => "No owner selected",
                "agent.required" => "No agent selected",
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

        $check = AgentProperty::where("agent_id", $request->agent)
        ->where("property_id", $request->property)
        ->where("deleted", 0)
        ->where("status", 1)
        ->first();

        if (!empty($check)) {
            return response()->json([
                "ok" => false,
                "msg" => "Agent is already associated with this property!"
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                $assign = AgentProperty::find($request->transid);

                if (empty($assign)) {
                    return response()->json([
                        "ok" => false,
                        "msg" => "Unknown code supplied",
                    ]);
                }

                $assign->update([
                    'agent_id' => $request->agent,
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

    public function deleteAgent(Request $request)
    {
        $record = Agents::find($request->transid);

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

    public function deleteAgentProperty(Request $request)
    {
        $record = AgentProperty::find($request->transid);

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

    public function restoreAgent(Request $request)
    {
        $record = Agents::find($request->transid);

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
                "msg" => "Delete failed",
            ]);
        }

        return response()->json([
            "ok" => true,
            "msg" => "Delete successful",
        ]);
    }
}
