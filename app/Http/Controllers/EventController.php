<?php namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class EventController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return <<<EOL
      <html>
        <head>
          <title>EventController Test</title>
        </head>

        <body>
          <form method="post" action="/api/events/add">
            <b>Title</b> <br />
            <input type='text' name='title' /> <br />
            <b>Description</b> <br />
            <input type='text' name='description' /> <br />
            <b>Location</b> <br />
            <input type='text' name='location' /> <br />
            <b>Category</b> <br />
            <select name='category_id'>
              <option value='1'>Sports</option>
              <option value='2'>Entertainment</option>
              <option value='3'>Other</option>
              <option value='4'>Greek</option>
              <option value='5'>School</option>
            </select> <br />
            <b>Attendee Limit</b> <br />
            <input type='number' name='attendee_limit' /> <br />
            <button type='submit'>Add Event</button>
          </form>
        </body>
      </html>
EOL;
	}

  public function addEvent()
  {
    $event = new Event();
    $event->title = Input::get('title');
    $event->description = Input::get('description');
    $event->location = Input::get('location');
    $event->category_id = Input::get('category_id');
    $event->time = new \DateTime();
    $event->photo_path = '/tmp';
    $event->attendee_limit = Input::get('attendee_limit');
    $event->save();
  }

  public function listEvents()
  {
    $events = array();

    if (Input::has('cat')) {
      $events = Event::where('category_id', '=', Input::get('cat'))->get();
    } else {
      $events = Event::take(5)->get();
    }
    $jsonData = array();
    $eventList = array();
    foreach ($events as $event) {
      array_push($eventList, array(
	'id' => $event->id,      
	'title' => $event->title,
        'description' => $event->description,
        'location' => $event->location,
        'photo_path' => $event->photo_path,
        'attendee_limit' => $event->attendee_limit,
        'category_id' => $event->category_id
      ));
    }
    $jsonData = array("success" => True, "events" => $eventList);
    return response()->json($jsonData);
  }
}
