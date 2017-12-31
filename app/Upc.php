<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Upc extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection='cmpny_sign_up';
    protected $collection1='indiv_sign_up';
    protected $collection2='users_facebook';
}
