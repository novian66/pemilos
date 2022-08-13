<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionSchoolCandidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id', 'election_school_id', 'description', 'nama', 'urutan', 'token', 'poster'
    ];
}
