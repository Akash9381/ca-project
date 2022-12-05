<?php

namespace App\Http\Controllers;

use App\Models\OTP;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class OTPController extends Controller
{
    public function GenerateOTP(Request $request){
        $user = User::where('number',$request->number)->first();
        if($user){
            $number = "+91".$request->number;
            $otp    = rand(1000,9999);
            $msg    = "Dear Customer, ".$otp." is your otp valid only for 10 minutes. Kindly Do not Share it with anyone. Thank you for choosing Tax Mail";
            try {

                $account_sid    = getenv("TWILIO_SID");
                $auth_token     = getenv("TWILIO_TOKEN");
                $twilio_number  = getenv("TWILIO_FROM");
                $client = new Client($account_sid, $auth_token);
                $client->messages->create($number, [
                    'from' => $twilio_number,
                    'body' => $msg]);

                $user    = User::where('number',$request->number)->first();
                OTP::updateOrCreate(['number'=>$request->number],
                [   'user_id' => $user['id'],
                    'number'  => $request->number,
                    'otp'     => $otp]);
                return response()->json(['success'=>true]);

            } catch (\Exception $e) {
                return response()->json["error: ". $e->getMessage()];
            }
        }else{
            return response()->json(['unautharized'=>true]);;
        }

    }

    public function OTPVerify(Request $request){
        $this->Validate($request, [
            'number' => 'required',
            'otp'    => 'required'
        ]);
        $generatedotp = OTP::where('number',$request->number)->first();
        if($generatedotp['otp']==$request['otp']){
            $user = User::where('number',$request['number'])->first();
            if($user){
                Auth::login($user);
                return redirect('/dashboard');
            }else{
                return redirect('/log-in');
            }
        }else{
            return back()->with('otperror','Invalid OTP');
        }
    }


}
