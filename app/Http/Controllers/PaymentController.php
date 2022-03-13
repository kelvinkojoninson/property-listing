<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentResource;
use App\Models\PaymentLog;
use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Payments::where('deleted', 0)->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => PaymentResource::collection($data)
        ]);
    }

    public function payments($userid, $property, $dateFrom, $dateTo)
    {
        $data = Payments::when($userid !== 'all', function ($q)  use ($userid) {
            return $q->where('userid', $userid);
        })->when($property !== 'all', function ($q)  use ($property) {
            return $q->where('property_id', $property);
        })->whereBetween('createdate', [$dateFrom." 00:00:00", $dateTo." 23:59:59"])
        ->where('deleted', 0)
        ->orderByDesc('createdate')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => PaymentResource::collection($data)
        ]);
    }

    public function logs($userid, $property, $dateFrom, $dateTo)
    {
        $data = PaymentLog::when($userid !== 'all', function ($q)  use ($userid) {
            return $q->where('userid', $userid);
        })->when($property !== 'all', function ($q)  use ($property) {
            return $q->where('property_id', $property);
        })->whereBetween('payment_date', [$dateFrom, $dateTo])
        ->orderByDesc('payment_date')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => PaymentResource::collection($data)
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
        //
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
        //
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
