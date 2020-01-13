<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceLog;

class ApiController extends Controller
{



    public function setServices(Request $request){

        $service  = Service::create($request->all());

        return  response()->json($service);


    }

    public function editServeices(){

    }

    public function getServices(){

    }

    public function getServicesAll(){
        $services = Service::all();
        return  response()->json($services);

    }


    public function setServiceLog($id, $status){
        $log = ServiceLog::create([
                "service_id" => $id,
                "status" => $status
            ]);

        return  response()->json($log);
    }

}
