<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'resume_link', 'about', 'experience', 'diploma'];
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
