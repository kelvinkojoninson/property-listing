<?php

namespace App\Http\Controllers;

use App\Http\Resources\PropertyResource;
use App\Models\Logs;
use App\Models\Properties;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Properties::where('deleted', 0)->orderByDesc('createdate')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => PropertyResource::collection($data)
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
                'status' => 'required',
                'title' => 'required',
                'description' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'buildingType' => 'required',
                'price' => 'required',
                // 'images.*' => 'mimes:jpeg,png,jpg'
            ],
            [
                // Status error messages
                "status.required" => "No status selected",

                // Building type error messages
                "buildingType.required" => "No building type selected",

                // Title error messages
                "title.required" => "No title supplied",

                // Description error messages
                "description.required" => "No description supplied",

                // Country error messages
                "country.required" => "No country supplied",

                // State error messages
                "state.required" => "State is required",

                // City error messages
                "city.required" => "City is required",

                // City error messages
                "address.required" => "Address is required",

                // City error messages
                "price.required" => "Price is required",

            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Property registration failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                $transid = strtoupper(bin2hex(random_bytes(4)));
         
                Properties::insert([
                    'transid' => $transid,
                    'status' => $request->status,
                    'country' => $request->country,
                    'state' => $request->state,
                    'ownership_status' => $request->status == 'Sold' ? 1 : 0,
                    'city' => $request->city,
                    'title' => $request->title,
                    'description' => $request->description,
                    'address' => $request->address,
                    'building_type' => $request->buildingType,
                    'gpsaddress' => $request->gpsaddress,
                    'price' => $request->price,
                    'bedrooms' => $request->bedrooms,
                    'baths' => $request->baths,
                    'floors' => $request->floors,
                    'garages' => $request->garages,
                    'area' => $request->area,
                    'longitude' => $request->longitude,
                    'latitude' => $request->latitude,
                    'schools_neighbourhood' => $request->schools_neighbourhood,
                    "createdate" =>  date("Y-m-d H:i:s"),
                    "createuser" =>  $request->createuser
                ]);

                if (!empty(json_decode($request->amenities))) {
                    foreach (json_decode($request->amenities) as $amenity) {
                        $amenity = $amenity->value;
                        $amenityArr[] = $amenity;
                    }

                    Properties::where("transid", $transid)->update([
                        "amenities" => json_encode($amenityArr),
                    ]);
                }

                if (!empty(json_decode($request->miscellaneous))) {
                    foreach (json_decode($request->miscellaneous) as $misc) {
                        $misc = $misc->value;
                        $miscArr[] = $misc;
                    }

                    Properties::where("transid", $transid)->update([
                        "misc" => json_encode($miscArr),
                    ]);
                }


                if ($request->hasfile('images')) {
                    foreach ($request->file('images') as $file) {
                        $filePath = $file->store("public/avatars");

                        $name = env("APP_URL") . "/" . str_replace("public", "storage", $filePath);
                        $data[] = $name;
                    }

                    Properties::where("transid", $transid)->update([
                        "pictures" => json_encode($data),
                    ]);
                }
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Property registered sucessfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while registering property, please contact admin",
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
                'status' => 'required',
                'title' => 'required',
                'description' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'price' => 'required',
                'buildingType' => 'required',
                // 'images.*' => 'mimes:jpeg,png,jpg'
            ],
            [
                // transid error messages
                "transid.required" => "No id supplied",

                // Userid error messages
                "userid.required" => "No userid supplied",

                // Status error messages
                "status.required" => "No status selected",

                // Building type error messages
                "buildingType.required" => "No building type selected",

                // Title error messages
                "title.required" => "No title supplied",

                // Description error messages
                "description.required" => "No description supplied",

                // Country error messages
                "country.required" => "No country supplied",

                // State error messages
                "state.required" => "State is required",

                // City error messages
                "city.required" => "City is required",

                // City error messages
                "address.required" => "Address is required",

                // City error messages
                "price.required" => "Price is required",

            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Property update failed: " . join(" ", $validator->errors()->all()),
            ]);
        }

        try {
            $transResult = DB::transaction(function () use ($request) {
                $property = Properties::where("transid", $request->transid)
                    ->where("deleted", 0)->first();

                if (empty($property)) {
                    return response()->json([
                        "ok" => false,
                        "msg" => "Unknown code supplied",
                    ]);
                }

                $property->update([
                    'status' => $request->status,
                    'ownership_status' => $request->status == 'Sold' ? 1 : 0,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'title' => $request->title,
                    'description' => $request->description,
                    'address' => $request->address,
                    'building_type' => $request->buildingType,
                    'gpsaddress' => $request->gpsaddress,
                    'price' => $request->price,
                    'bedrooms' => $request->bedrooms,
                    'baths' => $request->baths,
                    'floors' => $request->floors,
                    'garages' => $request->garages,
                    'area' => $request->area,
                    'longitude' => $request->longitude,
                    'latitude' => $request->latitude,
                    'schools_neighbourhood' => $request->schools_neighbourhood,
                    "modifydate" =>  date("Y-m-d H:i:s"),
                    "modifyuser" =>  $request->createuser
                ]);

                if (!empty(json_decode($request->amenities))) {
                    foreach (json_decode($request->amenities) as $amenity) {
                        $amenity = $amenity->value;
                        $amenityArr[] = $amenity;
                    }

                    Properties::where("transid", $request->transid)->update([
                        "amenities" => json_encode($amenityArr),
                    ]);
                }

                if (!empty(json_decode($request->miscellaneous))) {
                    foreach (json_decode($request->miscellaneous) as $misc) {
                        $misc = $misc->value;
                        $miscArr[] = $misc;
                    }

                    Properties::where("transid", $request->transid)->update([
                        "misc" => json_encode($miscArr),
                    ]);
                }


                if ($request->hasfile('images')) {
                    foreach ($request->file('images') as $file) {
                        $filePath = $file->store("public/avatars");

                        $name = env("APP_URL") . "/" . str_replace("public", "storage", $filePath);
                        $data[] = $name;
                    }

                    Properties::where("transid", $request->transid)->update([
                        "pictures" => json_encode($data),
                    ]);
                }
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Property updated successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while updating property, please contact admin",
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

    public function deleteProperty(Request $request)
    {
        $record = Properties::find($request->transid);

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
