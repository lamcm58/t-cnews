<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Advertisment extends Model
{
    use Notifiable;

    protected $table = 'advertisements';

    protected $fillable = [
        'adv_company', 'adv_position', 'adv_url', 'url_company', 'created_day', 'expired_day',
    ];

    public $timestamps = false;
}
