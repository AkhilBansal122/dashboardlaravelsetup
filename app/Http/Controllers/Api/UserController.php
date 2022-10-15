<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class UserController extends Controller
{
    public function logincheck(Request $request)
    {
        dd($request->all());
        date_default_timezone_set('Asia/Kolkata');
        $email = $request->email;

        if (!isset($email)) {
            $result = array('status' => false, 'message' => 'Email is required.');
        } else if (!isset($request->password)) {
            $result = array('status' => false, 'message' => 'Password is required.');
        } else {

            $password = md5($request->password);
            $emailExist = DB::table('users')->where('email', $email)->first();
            if (!empty($emailExist)) {
                if ($emailExist->email = $email) {
                    if ($emailExist->status == 1) {
                        if (Hash::check($request->password, $emailExist->password)) {

                            $data['login_check'] = 1;

                            DB::table('users')->where('email', $email)->update($data);
                            $image_url = url('public/images/userimage.png');
                            $emailExist->image =  isset($emailExist->image) ? $emailExist->image : $image_url;
                            $result = array('status' => true, 'message' => 'Logged in Successfully.', 'data' => $emailExist, 'old_password' => $request->password);
                        } else {
                            $result = array('status' => false, 'message' => 'Invalid Password');
                        }
                    } else {
                        $result = array('status' => false, 'message' => 'Your account has been deactivated by admin');
                    }
                } else {
                    $result = array('status' => false, 'message' => 'Invalid Email address');
                }
            } else {
                $result = array('status' => false, 'message' => 'User not registered');
            }
        }
        echo json_encode($result);
    }

    public function register(Request $request){
        
        $name = $request->name;
        $email = $request->email;

        $image_url = "/images/userimage.png";
        $password = Hash::make($request->password);
        $date = date("Y-m-d h:i:s", time());
        $data = [ 'name' => $name, 'image' => $image_url, 'email' => $email, 'password' => $password, 'status' => 1, 'role' => 1];
        $insertdata = User::create($data);
        if($insertdata){
            echo "save";
        }
    }
}
