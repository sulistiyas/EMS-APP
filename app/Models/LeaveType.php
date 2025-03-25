<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    protected $primaryKey = 'id_leave_type';
    protected $fillable = [
        'name',
        'description',
        'days',
    ];
}
