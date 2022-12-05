<?php

namespace App\Http\Controllers;

use App\Models\GST;
use App\Models\IncomeTax;
use App\Models\Payment;
use App\Models\TaxAudit;
use App\Models\TDS;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;
use Session;
use Exception;

class PaymentController extends Controller
{
    public function index(){
        return view('frontend.login.razorpay');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));

            } catch (Exception $e) {
                $paid = new Payment();
                $paid->user_id = Auth::user()->id;
                $paid->number = Auth::user()->number;
                $paid->amount = 100;
                $paid->payment = "failed";
                $paid->save();
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        $paid = new Payment();
        $paid->user_id = Auth::user()->id;
        $paid->number = Auth::user()->number;
        $paid->amount = 100;
        $paid->payment = "success";
        $paid->save();
        Session::put('success', 'Payment successful');
        return redirect('/dashboard');
    }

    public function Dashboard()
    {
        $paid    = Payment::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->first();
        if($paid){
            $hours   = Carbon::now()->diffInHours($paid['created_at']);
            $minutes = Carbon::now()->diffInMinutes($paid['created_at']);
            $seconds = Carbon::now()->diffInSeconds($paid['created_at']);
            if($hours<=72){
                $gstdata        = GST::where('user_id',Auth::user()->id)->get();
                $incometaxdata  = IncomeTax::where('user_id',Auth::user()->id)->get();
                $tdsdata        = TDS::where('user_id',Auth::user()->id)->get();
                $taxauditdata   = TaxAudit::where('user_id',Auth::user()->id)->get();
                return view('frontend.login.dashboard',compact('gstdata','incometaxdata','tdsdata','taxauditdata'));
            }else{
                return redirect()->route('razorpay.payment.index');
            }
        }else{
            return redirect()->route('razorpay.payment.index');
        }

    }
}
