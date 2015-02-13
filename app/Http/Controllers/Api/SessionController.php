<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Event;
use App\User;
use App\Attendee;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Auth;

class SessionController extends ApiController {

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
