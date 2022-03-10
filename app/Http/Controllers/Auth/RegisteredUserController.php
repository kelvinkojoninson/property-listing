<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agents;
use App\Models\Customers;
use App\Models\Logs;
use App\Models\Payments;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Wallet;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Stevebauman\Location\Facades\Location;

class RegisteredUserController extends Controller
{

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tblusers',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            $transResult = DB::transaction(function () use ($request) {
                $transid = strtoupper(bin2hex(random_bytes(4)));

                $user = User::create([
                    'userid' => $transid,
                    'fname' => $request->firstName,
                    'lname' => $request->lastName,
                    'email' => $request->email,
                    'username' => str_replace(' ', '_', strtolower(substr($request->firstName, 0, 4)) . $transid),
                    'password' => Hash::make($request->password),
                    'role' => 'tenant',
                    "createdate" =>  date("Y-m-d H:i:s"),
                    "createuser" =>  $transid
                ]);

                $wallet_id = "WA".strtoupper(bin2hex(random_bytes(5)));
                Wallet::create([
                    'userid' => $transid,
                    'wallet_id' => $wallet_id,
                ]);

                event(new Registered($user));

                Auth::login($user);
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }
            return redirect(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "Registration failed",
                "error" => [
                    "msg" => $e->__toString(),
                    "err_msg" => $e->getMessage(),
                    "fix" => "Please complete all required fields",
                ]
            ]);
        }
    }
}
