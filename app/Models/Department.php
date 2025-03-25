<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'id_department';
    // public $table = 'departments';
    protected $fillable = [
        'name'
    ];

    public function position(){
        return $this->hasMany(Position::class, 'id_department', 'id_department');
    }

    public function employee(){
        return $this->hasMany(Employee::class, 'id_department', 'id_department');
    }
}
