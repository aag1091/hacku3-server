<?php

use App\EventCategory;
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
