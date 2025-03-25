<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $primaryKey = 'id_position';
    protected $fillable = [
        'id_department',
        'name'
    ];

    public function department(){

        return $this->belongsTo(Department::class, 'id_department');
        
    }

    public function employee(){
        return $this->hasMany(Employee::class, 'id_position', 'id_position');
    }
}
