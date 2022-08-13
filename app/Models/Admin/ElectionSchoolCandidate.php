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

    public function hitung()
    {
        return $this->hasMany(ElectionVote::class, 'election_school_candidate_id');
    }
}
