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
}
