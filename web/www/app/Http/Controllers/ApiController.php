<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;
use App\Service;
use App\ServiceLog;

class ApiController extends Controller
{


    /*
    *   Create service in database
    */
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

    public function setServe(Request $request){
        $serve = Server::create( $request->all() );
        return  response()->json($serve);
    }

    public function getAllServe(){
        $serve = Server::all();
        return  response()->json($serve);
    }

}
