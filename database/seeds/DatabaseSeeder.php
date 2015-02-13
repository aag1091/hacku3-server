<?php


use App\EventCategory;
use App\User;
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
    $this->command->info('Event Categories Table Created!');
	}

}

class EventCategoriesSeeder extends Seeder {

	public function run()
	{
		DB::table('event_categories')->delete();
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
    DB::table('users')->delete();
    User::create(array(
      'name' => 'Quentin Headen',
      'email' => 'qheaden@cs.odu.edu',
      'password' => 'password'));

    User::create(array(
      'name' => 'Avinash Gosavi',
      'email' => 'agosavi@cs.odu.edu',
      'password' => 'password'));
    User::create(array(
      'name' => 'Alex Dohrn',
      'email' => 'adohrn@cs.odu.edu',
      'password' => 'password'));

    User::create(array(
      'name' => 'Raghav Cheedalla',
      'email' => 'rcheedal@cs.odu.edu',
      'password' => 'password'));

    User::create(array(
      'name' => 'Bharath Kongara',
      'email' => 'bkongara@cs.odu.edu',
      'password' => 'password'));
  }
}


