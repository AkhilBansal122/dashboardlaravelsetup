<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Services_details;
use App\Models\Services;
class ServicesDetailsControllers extends Controller
{
    public function services_details_list()
    {
        $services_details = services_details::all();
        return view("admin/services_details/services_details_list",compact('services_details'));
    }
    public function services_details_add()
    {
        $Services = Services::where("status",1)->get();

        return view("admin/services_details/services_details_add",compact('Services'));
    }
    public function services_details_edit()
    {
        $services_details = services_details::all();
        return view("admin/services_details/services_details_edit");
    }
    public function services_details_delete($id)
    {
        $services_details = services_details::all();
        $updateData = services_details::where("id",$id)->delete();
     return redirect("/services_details_list");
    }

    public function services_details_status(Request $request){
       
        if($request->all())
        {
            $id = $request->id;
            $status = $request->status;
            $updateData = services_details::where("id",$id)->update(array("status"=>$status));
            if($updateData){
                $result =array("status"=>true,"message"=>"services_details Status Changes Successfully.");
            }
            else
            {
                $result =array("status"=>false,"message"=>"services_details Status Changes falied.");
            }
        echo json_encode($result);
        }
    }
    public function manage_servicesdetails(Request $request)
    {
        if($request->all())
        {
           // dd($request->all());
            $service_id = $request->service_id;
            $name = $request->name;
            $description = $request->description;
            
            if($type=="service_details_add")
            {
                $fileimage="";
                $image_url='';
                if($request->hasfile('file'))
               {
                 $file_image=$request->file('file');
                 $fileimage=md5(date("Y-m-d h:i:s", time())).".".$file_image->getClientOriginalExtension();
                 $destination=public_path("images");
                 $file_image->move($destination,$fileimage);
                 $image_url="public/images".'/'.$fileimage;
               }
               else{
                $image_url='public/images/userimage.png';
               }
               

                $checkservices_details = services_details::where('name', 'LIKE', '%'.$name.'%')
                ->count();
                 if($checkservices_details > 0)
                {
                    $result = array("status"=>false,"message"=>"This services details is Already exist");
                }
                else
                {
                    $insertservices_details =services_details::create(array("service_id"=>$service_id,"image"=>$image_url,"name"=>$name,"description"=>$description));
                    if($insertservices_details)
                    {
                        $result = array("status"=>true,"message"=>"services details Added Successfully");
                    }
                    else
                    {
                        $result = array("status"=>false,"message"=>"services details Added Failed");
                    }
                }
            }
            else
            {
                $checkservices_details = services_details::where("id",$request->id)->first();
                $updatedservices_details =services_details::where("id",$request->id)->update(
                        array("name"=>isset($name) ? $name :$checkservices_details->name,"description"=>isset($description)  ?  $description : $checkservices_details->description));
                    if($updatedservices_details)
                    {
                        $result = array("status"=>true,"message"=>"services_details Updated Successfully");
                    }
                    else
                    {
                        $result = array("status"=>false,"message"=>"services_details Updated Failed");
                    }
            }
        
            echo json_encode($result);
        }
    } 
    
}
