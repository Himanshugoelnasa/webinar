<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Webinar;

class Student extends Model
{
    protected $fillable = [
      'webinar_id',
      'type',
      'name',
      'email',
      'phone',
      'organization',
      'faculty_designation',
      'qualification',
      'department_name',
      'address',
      'deleted_at',
    ];

    public function webinar() {
        return $this->belongsTo(Webinar::class);
    }
    
}
