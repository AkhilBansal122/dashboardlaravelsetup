<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Blog_categories;
class Blog_categoriesControllers extends Controller
{
    public function blogcategory_list()
    {
        $blogcategory = Blog_categories::all();
        return view("admin/blog/blog_category_list",compact('blogcategory'));
    }

    public function addblogcategory(Request $request){
        if($request->All())
        {
            $name = $request->name;
             $existBlog=Blog_categories::where("name",$name)->count();
          //  dd($existBlog);
             if($existBlog>0)
            {
                $result =array("status"=>false,"message"=>"Blog Category is Already exist please enter another blog");
            }
            else
            {
                $date=  date("Y-m-d h:i:s");
                
              $inserted =   Blog_categories::create(array("name"=>$name,"createda_at"=>$date,"updated_at"=>$date));
                if($inserted){
                    $result =array("status"=>true,"message"=>"Blog Category Added Successfully.");
                }
                else
                {
                    $result =array("status"=>false,"message"=>"Blog Category Added Failed.");
                }
            }
            echo json_encode($result);
        }
    }

    public function editblogcategory(Request $request){
        if($request->All())
        {
            $id = $request->id;
            $name = $request->name;
             $date=  date("Y-m-d h:i:s");
              $updateData = Blog_categories::where("id",$id)->update(array("name"=>$name,"updated_at"=>$date));
                if($updateData){
                    $result =array("status"=>true,"message"=>"Blog Category Updated Successfully.");
                }
                else
                {
                    $result =array("status"=>false,"message"=>"Blog Category Updated Failed.");
                }
            
            echo json_encode($result);
        }
    }
    public function blogcategory_status(Request $request){
       
        if($request->all())
        {
            $id = $request->id;
            $status = $request->status;
           
            $updateData = Blog_categories::where("id",$id)->update(array("status"=>$status));
            if($updateData){
                $result =array("status"=>true,"message"=>"Blog Status Changes Successfully.");
            }
            else
            {
                $result =array("status"=>false,"message"=>"Blog Status Changes fales.");
            }
        
        echo json_encode($result);
        }
    }
    public function blogcategory_del($id){
        $updateData = Blog_categories::where("id",$id)->delete();
        return redirect("/blogcategory_list");
    }
}
