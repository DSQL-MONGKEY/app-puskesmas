<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function polies(){
        return $this->belongsTo(Polies::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function operations_day(){
        return $this->belongsTo(OperationsDay::class);
    }
}
