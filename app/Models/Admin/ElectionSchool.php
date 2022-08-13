<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionSchool extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id', 'title', 'deskripsi', 'start', 'end', 'status', 'token', 'image'
    ];
}
