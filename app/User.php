<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    // protected $table= 'table name here' ;
    //[this only need to be done if table is not created with model]

	use \Illuminate\Auth\Authenticatable;
}
