<?php

namespace App\Http\Controllers;

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
        //
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
    public function update(Request $request, $id)
    {
       
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
