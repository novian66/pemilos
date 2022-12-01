<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School_group extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'status', 'school_id'
    ];
}
