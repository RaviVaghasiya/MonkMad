<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientInfo extends Model
{
    protected $table = 'client_info';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'mobile_number', 'location', 'requirement',
    ];
}
