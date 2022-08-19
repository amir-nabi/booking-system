<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'expertise_id', 'email', 'description', 'image'];

    public function expertise(){
        return $this->belongsTo(Expertise::class,'expertise_id','id');
    }
    public function bookings(){
        return $this->hasMany(Booking::class,'admin_id','id');
    }
}
