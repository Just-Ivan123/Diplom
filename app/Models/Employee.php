<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'position',
    ];
    public function payroll()
    {
        return $this->hasMany(Payroll::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
