<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
     protected $fillable = [
    'phone',
    'check_in',
    'check_out',
    'members'
];
}
