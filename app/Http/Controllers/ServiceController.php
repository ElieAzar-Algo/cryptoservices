<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Service;
use App\Models\Payment;
use App\Models\Coin;
use Illuminate\Support\Facades\Request as FacadesRequest;
use TCG\Voyager\Http\Controllers\VoyagerController as BaseVoyagerController;

class ServiceController extends BaseVoyagerController
{
    public function web_index(){
        Log::info("services list");
        $services = Service::all();
        $coins = Coin::all();
        Log::info($services);
        return view('welcome')->with(compact('services','coins'));
    }

    public function web_view(){
        $id = request()->id;
        Log::info("service details");
        $service = Service::find($id);
        Log::info($service);
        return view('service-details')->with(compact('service'));
    }

    public function web_message(){
        $request= request();
        Log::info($request);
       
        Message::create([
            'name'=>$request->name,
            'userid'=>(integer)$request->userid,
            'email'=>$request->email,
            'message'=>$request->message
        ]);
        
        return redirect()->route('home');
    }

    public function web_pay(){
        Log::info("payy");
       $request=request();
       Log::info($request);
       $payment = Payment::create([
           'userid'=>auth()->id(),
           'serviceid'=>$request->serviceid,
          
           'name'=>$request->name,
           'cardnumber'=>$request->cardnumber,
           'expirydate'=>$request->expirydate,
           'servicename'=>$request->servicename,
           'price'=>$request->price,

       ]);

        return view('thankyou')->with(compact('payment'));
       
    }

    public function web_pleasesignin(){
    
        return view('pleasesignin');
       
    }

    public function web_contactus(){
    
        return view('contactus');
       
    }


}
