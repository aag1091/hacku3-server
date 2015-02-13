<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;
use App\User;

class ApiController extends Controller {

	use DispatchesCommands, ValidatesRequests;

  public function currentUser()
  {
    if (Input::has('user_id'))
      return User::find(Input::get('user_id'))->firstOrFail();
    return NULL;
  }

}
