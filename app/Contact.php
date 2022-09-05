<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = 'support';
    protected $fillable = [
    //if id is not autoincrement then add 'id'

    'name', 
    'email', 
    'phone',
    'subject',
    'enquiry'
];
}