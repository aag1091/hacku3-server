<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Event;
use App\User;
use App\Attendee;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Auth;

class UserAccountController extends ApiController {
  public function events()
  {
    $events = array();
    $jsonData = array();

    $user = $this->currentUser();
    if ($user == NULL)
      return response()->json(array('success' => False));

    $events_created = Event::where('user_id', '=', $user->id)->get();
    $event_ids = Attendee::where('user_id', '=', $user->id)->get();
    $event_ids = $event_ids->map(function($event)
    {
      $event->id;
    });
    $events_attending = Event::where('id', 'in', $event_ids)->where('time', '>=', new \DateTime())->get();
    $events['events_created'] = $events_created;
    $events['events_attending'] = $events_attending;

    $jsonData = array("success" => True, "events" => $events);
    return response()->json($jsonData);
  }  
}
