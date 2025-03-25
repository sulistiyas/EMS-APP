<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveBalance extends Model
{
    protected $primaryKey = 'id_leave_balance';
    protected $fillable = [
        'id_employee',
        'days',
        'taken',
        'year',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_employee');
    }
}
