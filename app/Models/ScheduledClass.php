<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledClass extends Model
{
    use HasFactory;

    protected $guarded = null;

    protected $casts = [
        'date_time' => 'datetime'
    ];

    public function instructor() {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function classType() {
        return $this->belongsTo(ClassType::class);
    }

    public function members() {
        return $this->belongsToMany(User::class, 'bookings');
    }
}
