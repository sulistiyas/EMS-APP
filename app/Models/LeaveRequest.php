<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $primaryKey = 'id_leave_request';
    protected $fillable = [
        'id_employee',
        'id_leave_type',
        'start_date',
        'end_date',
        'days',
        'reason',
        'status',
        'approved_by',
        'approved_at',
        'rejected_by',
        'rejected_at',
        'canceled_by',
        'canceled_at',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_employee');
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'id_leave_type');
    }
}
