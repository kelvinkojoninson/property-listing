<?php

namespace App\Console\Commands;

use App\Models\PaymentLog;
use App\Models\Payments;
use App\Models\TenantProperty;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletHistory;
use Illuminate\Console\Command;

class DailyCharge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'charge:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respetively charge all tenants daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tenants = User::where('role', 'tenant')->where('deleted', 0)->get();

        foreach ($tenants as $tenant) {
            $wallet = Wallet::where('userid', $tenant->userid)->first();
            $balance = WalletHistory::where('userid', $tenant->userid)->sum('amount');
            $properties = TenantProperty::with('property')->where('tenant_id', $tenant->userid)->where('status', 0)->where('deleted', 0)->get();

            foreach ($properties as $property) {
                if ($balance >= $property->property->price) {
                    WalletHistory::insert([
                        "transid" => "TR" . strtoupper(bin2hex(random_bytes(5))),
                        "userid" => $tenant->userid,
                        "wallet_id" => $wallet->wallet_id,
                        "amount" => -($property->property->price),
                        "currency" => "GHS",
                        "reference" => json_encode($property->property->transid),
                        "transtype" => "credit",
                        "channel" => 'wallet',
                        "ifo" => "Property ID: ".$property->property->transid,
                    ]);

                    $paymentId = strtoupper(bin2hex(random_bytes(5)));

                    Payments::insert([
                        "transid" => $paymentId,
                        "property_id" => $property->property->transid,
                        "userid" => $tenant->userid,
                        "amount_due" => $property->property->price,
                        "amount_paid" => $property->property->price,
                        "balance" => 0,
                        "payment_mode" => 'WALLET',
                        "reference" =>  date("Y-m-d"),
                        "createdate" =>  date("Y-m-d H:i:s"),
                        "createuser" =>  $tenant->userid,
                    ]);

                    PaymentLog::insert([
                        "payment_id" => $paymentId,
                        "property_id" => $property->property->transid,
                        "userid" => $tenant->userid,
                        "amount_due" => $property->property->price,
                        "status" => 0,
                        "reference" => 'Credited Successfully',
                        "payment_date" => date("Y-m-d"),
                    ]);
                }else{
                    TenantProperty::where('tenant_id', $tenant->userid)
                    ->where('property_id', $property->property->transid)
                    ->where('deleted', 0)
                    ->update(['status' => 1]);

                    PaymentLog::insert([
                        "property_id" => $property->property->transid,
                        "userid" => $tenant->userid,
                        "amount_due" => $property->property->price,
                        "status" => 1,
                        "reference" => 'Payment failed. Low balance',
                        "payment_date" => date("Y-m-d"),
                    ]);
                }
            }
        }
         
        $this->info('Successfully charged all tenants.');
    }
}
