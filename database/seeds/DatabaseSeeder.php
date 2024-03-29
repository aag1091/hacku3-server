<?php


use App\EventCategory;
use App\User;
use App\Event;
use App\Cred;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('EventCategoriesSeeder');
    $this->call('UsersSeeder');
    $this->call('EventsSeeder');
    $this->call('UniversitiesSeeder');
    $this->call('CredSeeder');
    $this->command->info('All Tables Seeded!');
	}

}

class EventCategoriesSeeder extends Seeder {

	public function run()
	{
		DB::table('event_categories')->truncate();
    EventCategory::create(array('name' => 'sports'));
    EventCategory::create(array('name' => 'entertainment'));
    EventCategory::create(array('name' => 'other'));
    EventCategory::create(array('name' => 'greek'));
    EventCategory::create(array('name' => 'school'));
		
	}
}

class UsersSeeder extends Seeder {

  public function run()
  {
    DB::table('users')->truncate();
    User::create(array(
      'name' => 'Quentin Headen',
      'email' => 'qheaden@cs.odu.edu',
      'password_confirmation' => 'password',
      'password' => 'password'));

    User::create(array(
      'name' => 'Avinash Gosavi',
      'email' => 'agosavi@cs.odu.edu',
      'password_confirmation' => 'password',
      'password' => 'password'));
    
    User::create(array(
      'name' => 'Alex Dohrn',
      'email' => 'adohrn@cs.odu.edu',
      'password_confirmation' => 'password',
      'password' => 'password'));

    User::create(array(
      'name' => 'Raghav Cheedalla',
      'email' => 'rcheedal@cs.odu.edu',
      'password_confirmation' => 'password',
      'password' => 'password'));

    User::create(array(
      'name' => 'Bharath Kongara',
      'email' => 'bkongara@cs.odu.edu',
      'password_confirmation' => 'password',
      'password' => 'password'));
  }
}

class EventsSeeder extends Seeder {

  public function run()
  {
    DB::table('events')->truncate();
    Event::create(array(
      'user_id' => 1,
      'category_id' => 1,
      'title' => 'HackU3',
      'description' => 'University hackathon event hosted by Dominion Enterprises.',
      'location' => '150 Granby Street, Norfolk, VA 23510',
      'time' => '2015-2-13',
      'photo_path' => '/tmp',
      'attendee_limit' => 60));
    
    Event::create(array(
      'user_id' => 2,
      'category_id' => 2,
      'title' => 'ODU Hackathon',
      'description' => 'Hackathon hosted by Old Dominion University.',
      'location' => '5115 Hampton Blvd, Norfolk, VA 23529',
      'time' => '2015-3-21',
      'photo_path' => '/tmp',
      'attendee_limit' => 0));

    Event::create(array(
      'user_id' => 3,
      'category_id' => 3,
      'title' => 'Pickup Basketball Game',
      'description' => 'Fun pickup game in the student b-ball courts.',
      'location' => 'ODU Basketball Court',
      'time' => '2015-2-13',
      'photo_path' => '/tmp',
      'attendee_limit' => 10));
  }
}

class UniversitiesSeeder extends Seeder {

  public function run()
  {
    DB::table('universities')->truncate();
  }
}

class CredSeeder extends Seeder {

  public function run()
  {
    DB::table('cred')->truncate();
    // Give seeded cred to the seeded users for their
    // created events. This is simulating what the
    // event controller would add on an event creation.
    Cred::create(array(
      'user_id' => 1,
      'event_id' => 1,
      'cred' => 5
    ));

    Cred::create(array(
      'user_id' => 2,
      'event_id' => '2',
      'cred' => 5
    ));

    Cred::create(array(
      'user_id' => 3,
      'event_id' => 3,
      'cred' => 5
    ));
  }
}
