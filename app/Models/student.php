<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        'rollno',
        'name',
        'DEPT_ID',
        'C_ID'
    ];
    public function department()
    {
        return $this->HasOne(department::class);
    }
    public function course()
    {
        return $this->hasMany(course::class);
    }
}
