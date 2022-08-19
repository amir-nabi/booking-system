<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'datetime', 'endtime', 'admin_id', 'expertise_id'];
    protected $dates = [
        'datetime'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class,'admin_id','id'); //admin_id here is doctor_id actually
    }
    public function expertise(){
        return $this->belongsTo(Expertise::class,'expertise_id','id');
    }
}
