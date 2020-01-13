<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceLog extends Model
{

    protected $table = 'services_log';

    protected $fillable = [
        'service_id', 'status',
    ];


}
