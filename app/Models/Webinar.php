<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Webinar extends Model
{
    protected $fillable = [
      'title',
      'slug',
      'status',
      'place',
      'schedule_date'
    ];


    public function students() {
        return $this->hasMany(Student::class, 'webinar_id');
    }
    
}
