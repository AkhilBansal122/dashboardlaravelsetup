<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index()
    {
       return view("admin/Login");
    }
    

    public function customLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $remember_me = $request->has('remember') ? true : false; 
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me))
        {
            
            $user = auth()->user();
            $request->session()->put('id',$user->id);
            $request->session()->put('name',$user->name);
            $request->session()->put('email',$user->email);
            $request->session()->put('role',$user->role);
            $request->session()->put('phone',$user->phone);
            $user = Auth::getProvider()->retrieveByCredentials(['email' => $request->input('email'), 'password' => $request->input('password')]);
            
            if($remember_me==true)
            {
                $minutes = 14400;
                $response = new Response();
                $cooky=(cookie('remember_me', $user->remember_token, $minutes));
                return redirect()->to('/dashboard') ->withSuccess('Signed in')->withCookie($cooky);
            }
            else
            {
                $minutes = 0;
                return redirect()->to('/dashboard') ->withSuccess('Signed in')->withCookie(cookie('remember_me','', $minutes));
            }
        }else{
            return redirect('/admin')->with('msg', 'Please enter valid login credentials.');  
        }
    
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
	public function my_profile()
	{
		if(!empty(session('id'))){
			$get_user = User::where("id",session('id'))->first();
            return view("admin/my_profile",compact("get_user"));
		}			
	}
    public function update_admin_profile(Request $request)
        {
             if(!empty($request->input()))
            {
                   $image_url='public/images/userimage.png';
              //  dd($request->file());
                 //  dd($request->input());
                $id = $request->id;
                $usreData = User::where('id',$id)->first();
                $users =  new User();
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
                  else
                  {
                    $image_url= $usreData->image;
                  }
                $user =   $users->where("id",$id)->first();
                $data['name'] = isset($request->name)? $request->name: $user->name;
                $data['image']=$image_url;
                $update=  User::where('id', $id)
                ->update($data);
                if($update)
                {
                    $result = array("status"=> true, "message"=>"Profile Update Successfully");
                }
                else
                {
                    $result = array("status"=> true, "message"=>"Profile Update Fail");
                }
            }
            echo json_encode($result);
            } 
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/'); //redirect back to login
    }
	
    public function user_change_password(Request $request)
    {
        if(!empty($request->input()))
        {

            $old_password = $request->old_password;
            $new_password = $request->new_password;
            $id = session('id');
             $users =  new User();
            
            $user =   $users->where("id",$id)->first();
            if($old_password==$new_password)
            {
                  $result = array("status"=> false, "message"=>"Old Password and New Password should not be same");
            }
            else
            {
                if (!$user) {
                    $result = array("status"=> false, "message"=>"invalid old password");
                    
                 }

                 if (!Hash::check($old_password, $user->password)) {
                    $result = array("status"=> false, "message"=>"invalid old password");
                 }
                 else{
                    
                //    $result = array("status"=> false, "message"=>"invalid old password");
                    $data['password'] = Hash::make($new_password);
                  
                    $update = $user->where('id',$id) ->update($data);
                    $result = array("status"=> true, "message"=>"change password Successfully");
               }  
             }
         echo json_encode($result);
        }
    }
    public function forgetpassword(Request $request){
        dd($request->all());
    }
	 public function signout() {
        Session::flush();
        Auth::logout();
        return Redirect('/admin'); //redirect back to login
    }
    
}
