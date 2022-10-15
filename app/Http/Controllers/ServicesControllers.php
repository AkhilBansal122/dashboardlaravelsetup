<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Services;
class ServicesControllers extends Controller
{
    public function services_list()
    {
        $services = Services::all();
        return view("admin/services/services_list",compact('services'));
    }
    public function services_add()
    {
        return view("admin/services/services_add");
    }
    public function services_edit()
    {
        $Services = Services::all();
        return view("admin/services/services_edit");
    }
    public function services_delete($id)
    {
        $Services = Services::all();
        $updateData = Services::where("id",$id)->delete();
     return redirect("/services_list");
    }

    public function services_status(Request $request){
       
        if($request->all())
        {
            $id = $request->id;
            $status = $request->status;
            $updateData = Services::where("id",$id)->update(array("status"=>$status));
            if($updateData){
                $result =array("status"=>true,"message"=>"Services Status Changes Successfully.");
            }
            else
            {
                $result =array("status"=>false,"message"=>"Services Status Changes falied.");
            }
        echo json_encode($result);
        }
    }
    public function manage_services(Request $request)
    {
        if($request->all())
        {
           // dd($request->all());
            $type = $request->type;
            $name = $request->name;
            $description = $request->description;
            if($type=="service_add")
            {
                $checkServices = Services::where('name', 'LIKE', '%'.$name.'%')
                ->count();
                 if($checkServices > 0)
                {
                    $result = array("status"=>false,"message"=>"This services is Already exist");
                }
                else
                {
                    $insertServices =Services::create(array("name"=>$name,"description"=>$description));
                    if($insertServices)
                    {
                        $result = array("status"=>true,"message"=>"Services Added Successfully");
                    }
                    else
                    {
                        $result = array("status"=>false,"message"=>"Services Added Failed");
                    }
                }
            }
            else
            {
                $checkServices = Services::where("id",$request->id)->first();
                $updatedServices =Services::where("id",$request->id)->update(
                        array("name"=>isset($name) ? $name :$checkServices->name,"description"=>isset($description)  ?  $description : $checkServices->description));
                    if($updatedServices)
                    {
                        $result = array("status"=>true,"message"=>"Services Updated Successfully");
                    }
                    else
                    {
                        $result = array("status"=>false,"message"=>"Services Updated Failed");
                    }
            }
        
            echo json_encode($result);
        }
    } 
    
}
