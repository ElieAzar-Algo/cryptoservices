<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Service;
use App\Models\Payment;
use App\Models\Coin;
use App\Models\User;
use Illuminate\Support\Facades\Request as FacadesRequest;
use TCG\Voyager\Http\Controllers\VoyagerController as BaseVoyagerController;
use Carbon\Carbon;

class ServiceController extends BaseVoyagerController
{
    public function web_index()
    {
        Log::info("services list");
        $services = Service::all();
        $coins = Coin::all();
        Log::info($services);
        return view('welcome')->with(compact('services', 'coins'));
    }

    public function web_view()
    {
        $id = request()->id;
        Log::info("service details");
        $service = Service::find($id);
        Log::info($service);
        return view('service-details')->with(compact('service'));
    }

    public function web_message()
    {
        $request = request();
        Log::info($request);

        Message::create([
            'name' => $request->name,
            'userid' => (int)$request->userid,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return redirect()->route('home');
    }

    public function web_pay()
    {
        Log::info("payy");
        $request = request();
        Log::info($request);
        $payment = Payment::create([
            'userid' => auth()->id(),
            'serviceid' => $request->serviceid,

            'name' => auth()->user()->name,
            'cardnumber' => $request->cardnumber,
            'expirydate' => $request->expirydate,
            'servicename' => $request->servicename,
            'price' => $request->price,

        ]);

        return view('thankyou')->with(compact('payment'));
    }

    public function web_coin()
    {

        $id = request()->id;
        Log::info(request());
        $coin = Coin::find($id);
        $services = Service::all();

        return view('coindetails')->with(compact('coin', 'services'));
    }

    public function web_profile()
    {

        $id = auth()->id();
        Log::info(request());
        $user = User::where('id', $id)->with('payments')->first();
        Log::info($user);

        return view('myprofile')->with(compact('user'));
    }
    public function web_pleasesignin()
    {

        return view('pleasesignin');
    }

    public function web_contactus()
    {

        return view('contactus');
    }


    public function startPredict()
    {
        if (auth()->user()) {
            $output = "";
            return view('prediction')->with(compact('output'));
        } else {
            return redirect()->route('service', "id=3");
        }
    }
    public function predict()
    {
        if (auth()->user()) {
            // $output = exec('python3 /pythonScripts/AIPrediction.py');
            $output = exec('python3 /home/elieazar/Desktop/Main-Desktop/AUL/spring2022/WebDev/final/cryptoservices/pythonScripts/AIPrediction.py');

            $output_array = json_decode($output);

            Log::info($output_array);

            return view('prediction')->with(compact('output'));
        } else {
            return redirect()->route('service', "id=3");
        }
    }

    public function delPayment(){

    }
}
