<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'id_employee';
    protected $fillable = [
        'id_user',
        'id_department',
        'id_position',
        'name',
        'phone',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'id_department','id_department');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'id_position');
    }

    public function leaveBalances()
    {
        return $this->hasMany(LeaveBalance::class, 'id_employee');
    }
}
