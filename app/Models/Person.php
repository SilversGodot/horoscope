<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'people';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'house_number',
        'street_name',
        'street_type',
        'city',
        'state',
        'postal_code',
        'birthday',
        'gender',
        'horoscope'
    ];
}
