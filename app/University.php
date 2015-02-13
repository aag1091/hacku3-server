<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model {

	protected $table = 'universities';

  protected $fillable = array('name', 'university_domain', 'is_active');

}
