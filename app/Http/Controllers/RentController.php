<?php

namespace App\Http\Controllers;

use App\Http\Resources\WalletHistoryResource;
use App\Http\Resources\WalletResource;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletHistory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Unicodeveloper\Paystack\Facades\Paystack;

class RentController extends Controller
{
    // Get wallets
    public function wallets()
    {
        $wallets = Wallet::all();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => WalletResource::collection($wallets),
        ]);
    }

    // Get wallet history
    public function walletHistory($tenant, $dateFrom, $dateTo)
    {
        $wallets = WalletHistory::when($tenant !== 'all', function ($q)  use ($tenant) {
            return $q->where('userid', $tenant);
        })->whereBetween('created_at', [$dateFrom." 00:00:00", $dateTo." 23:59:59"])
            ->orderByDesc('id')->get();

        return response()->json([
            'ok' => true,
            'msg' => 'Request successful',
            'data' => WalletHistoryResource::collection($wallets),
        ]);
    }

     // Redirect to debit
     public function pay(Request $request)
     {
         $validator = Validator::make(
             $request->all(),
             [
                 "amount" => "required|regex:/^\d+(\.\d{1,2})?$/|min:1.00",
                 "userid" => "required|exists:tblusers,userid,deleted,0",
             ],
 
             [
                 "amount.required" => "Amount to deposit is required!",
                 "amount.regex" => "Amount must be a valid amount like '12' or '12.5' or '12.05'!",
                 "amount.min" => "A minimum of GHS 1.00 is required!",
                 "userid.required" => "User ID is required!",
                 "userid.exists" => "User not found!",
 
             ]
         );
 
         if ($validator->fails()) {
             return response()->json([
                 "ok" => false,
                 "msg" => "Transaction failed: " . join(" ", $validator->errors()->all()),
             ]);
         }
 
         try {
             $user = User::where('userid', $request->userid)->first();
             $wallet = Wallet::firstOrCreate([
                 'userid' => $request->userid,
             ], [
                 'wallet_id' => "WA" . strtoupper(bin2hex(random_bytes(5))),
                 'userid' => $request->userid,
             ]);
 
             $request->merge(
                 [
                     'email' => $user->email,
                     'phone' => $user->phone,
                     'currency' => 'GHS',
                     'reference' => Paystack::genTranxRef(),
                     'amount' => round($request->amount, 2) * 100,
                     "metadata" => [
                         'transid' => "TR" . strtoupper(bin2hex(random_bytes(5))),
                         "userid" => $request->userid,
                         "wallet_id" => $wallet->wallet_id,
                         "purpose" => "debit",
                     ],
                 ]
             );
 
             return response()->json([
                "ok" =>  true,
                'msg' => Paystack::getAuthorizationUrl(),
            ]);

         } catch (\Exception $e) {
             return response()->json([
                 "ok" =>  false,
                 'msg' => $e->getMessage(),
                 'type' => 'error'
             ]);
         }
     }

      // Debit wallet
    public function debit($res)
    {
        try {
            $transResult = DB::transaction(function () use ($res) {
                $user = User::where('userid', $res['data']['metadata']['userid'])->first();

                WalletHistory::create([
                    "transid" => $res['data']['metadata']['transid'],
                    "userid" => $res['data']['metadata']['userid'],
                    "wallet_id" => $res['data']['metadata']['wallet_id'],
                    "amount" => $res['data']['amount'] / 100,
                    "currency" => "GHS",
                    "reference" => json_encode($res['data']),
                    "transtype" => "debit",
                    "channel" => $res['data']['channel'],
                    "ifo" => "Deposit",
                ]);
             });


            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return redirect()->route('myrents')->with('wallet',"GHS ".number_format(($res['data']['amount'] / 100), 2)." loaded to wallet sucessfully");
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "Transaction failed",
                "error" => [
                    "msg" => $e->__toString(),
                    "err_msg" => $e->getMessage(),
                    "fix" => "Please complete all required fields",
                ]
            ]);
        }
    }

     // Paystack payment verification 
     public function handleGatewayCallback(Request $request)
     {
         $res = Paystack::getPaymentData();
 
         if (!$res['status']) {
             return [
                 "ok" => false,
                 "errorString" => "ERR_NO_RESPONSE_STATUS",
                 "customerSupport" => env("CUSTOMER_SUPPORT_NUMBER", "0302955754"),
             ];
         }
 
         if ($res['data']['status'] === "success") {
             return $this->debit($res);
             
         }
     }
}
