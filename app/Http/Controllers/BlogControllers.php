<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Blog;
use App\Models\Blog_categories;
use File;
class BlogControllers extends Controller
{
    public function blog_list()
    {
        $blog = Blog::join('blog_categories', 'blogs.blog_category_id', '=', 'blog_categories.id')
        ->get(['blogs.*', 'blog_categories.name as blog_category_name']);
        $blog_categories = Blog_categories::where("status",1)->get();
        return view("admin/blog/blog_list",compact('blog','blog_categories'));
    }
    public function addblogView(){
        $Blog_categories = Blog_categories::where("status",1)->get();
        return view("admin/blog/addblog",compact('Blog_categories'));
    }

    public function addblog(Request $request){
        if($request->All())
        {
            $fileimage = "";
            $image_url = '';
            if ($request->hasfile('blogimage')) {
                $file_image = $request->file('blogimage');
                $fileimage = md5(date("Y-m-d h:i:s", time())) . "." . $file_image->getClientOriginalExtension();
                $destination = public_path("images/blog");
                $file_image->move($destination, $fileimage);
                $image_url = '/images/blog' . '/' . $fileimage;
            } 

                $date=  date("Y-m-d h:i:s");
                
              $inserted =   Blog::create(array("blog_category_id"=>$request->blog_category_id,"blogimage"=>$image_url,"blog_description"=>$request->blog_description,"blog_public_date"=>$request->blog_public_date,"author_name"=>$request->author_name,"blog_title"=>$request->blog_title,"blog_category"=>$request->blog_category,"createda_at"=>$date,"updated_at"=>$date));
                if($inserted){
                    $result =array("status"=>true,"message"=>"Blog Added Successfully.");
                }
                else
                {
                    $result =array("status"=>false,"message"=>"Blog Added Failed.");
                }
            echo json_encode($result);
            }
    }

    public function editblog(Request $request){
        if($request->All())
        {
          //  dd($request->all());
            $id = $request->id;
            $getblog = blog::where("id",$id)->first();
         //   dd($getblog);
            $fileimage = "";
            $image_url = '';
            if ($request->hasfile('blogimage')) {
                $file_image = $request->file('blogimage');
                $fileimage = md5(date("Y-m-d h:i:s", time())) . "." . $file_image->getClientOriginalExtension();
                $destination = public_path("images/blog");
                $file_image->move($destination, $fileimage);
                $image_url = '/images/blog' . '/' . $fileimage;
            } 
            else
            {
                $image_url = $request->oldblogimage;
            }

            $date=  date("Y-m-d h:i:s");
                $updateData  =array(
                    "blog_category_id"=>isset($request->blog_category_id) ? $request->blog_category_id : $getblog->blog_category_id,
                    "blogimage"=>$image_url,
                    "blog_description"=>isset($request->blog_description) ? $request->blog_description :$getblog->blog_description ,
                    "blog_public_date"=>isset($request->blog_public_date) ? $request->blog_public_date :$getblog->blog_public_date,
                    "author_name"=>isset($request->author_name) ? $request->author_name : $getblog->author_name,
                    "blog_title"=>isset($request->blog_title) ? $request->blog_title : $getblog->blog_title,
                    "updated_at"=>$date);
              //      dd($updateData);
              $updated =   Blog::where("id",$request->id)->update($updateData);
                if($updated){
                    $result =array("status"=>true,"message"=>"Blog Updated Successfully.");
                }
                else
                {
                    $result =array("status"=>false,"message"=>"Blog Updated Failed.");
                }
            echo json_encode($result);
            }
    }
    public function blog_status(Request $request){
       
        if($request->all())
        {
            $id = $request->id;
            $status = $request->status;
            $updateData = Blog::where("id",$id)->update(array("status"=>$status));
            if($updateData){
                $result =array("status"=>true,"message"=>"Blog Status Changes Successfully.");
            }
            else
            {
                $result =array("status"=>false,"message"=>"Blog Status Changes falied.");
            }
        
        echo json_encode($result);
        }
    }
    public function blog_del($id){
        $updateData = Blog::select("blogimage")->where("id",$id)->first();
        $updateData = Blog::select("blogimage")->where("id",$id)->delete();

        // if(!empty($updateData->blogimage))
        // {
        //     unlink(url($updateData->blogimage));
        // }

        return redirect("/blog_list");
    }
}
