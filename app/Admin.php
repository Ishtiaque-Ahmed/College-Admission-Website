<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Admin extends Model implements Authenticatable
{
	//Use Notifiable;
	protected $guard='admin';
    // protected $table= 'table name here' ;
    //[this only need to be done if table is not created with model]

	use \Illuminate\Auth\Authenticatable;
}
