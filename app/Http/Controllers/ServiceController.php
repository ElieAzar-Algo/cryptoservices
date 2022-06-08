<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Service;

use TCG\Voyager\Http\Controllers\VoyagerController as BaseVoyagerController;

class ServiceController extends BaseVoyagerController
{
    public function web_index(){
        Log::info("services list");
        $services = Service::all();
        Log::info($services);
        return view('welcome')->with(compact('services'));
    }

    public function web_view(){
        $id = request()->id;
        Log::info("service details");
        $service = Service::find($id);
        Log::info($service);
        return view('service-details')->with(compact('service'));
    }

    public function web_pay(){
        $request = request();
        Log::info($request);
       
    }

}
