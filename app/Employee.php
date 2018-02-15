<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // protected $dateFormat = 'd/m/Y';
    protected $fillable = [
        'name',
        'card_id',
        'address',
        'email',
        'phone',
        'gender',
        'dependents',
        'hired_at',
        'fired_at',
    ];
}
