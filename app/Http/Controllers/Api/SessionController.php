<?php namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Auth;

class SessionController extends Controller {

	public function login()
	{
    $email = Input::get('email');
    $password = Input::get('password');	
		$success = "False";
		$user = new User();
		
		if(Auth::attempt(['email' => $email, 'password' => $password])){
			$user = User::where('email', '=', $email)->firstOrFail();
			$success = True;
		}
		$jsonData = array("success" => $success, "user_id" => $user->id);
		return response()->json($jsonData);
	}
	

	public function logout()
	{
		$jsonData = array("success" => "true");
		return response()->json($jsonData);
	}
	

}
