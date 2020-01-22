<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $connection = 'mysql';
    protected $table = 'agenda.phones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand', 'model', 'serial_number', 'phone_number_1', 'phone_number_2', 'fast_dial', 'imei_1', 'imei_2', 'status',
    ];
}
