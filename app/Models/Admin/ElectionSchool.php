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

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function vote()
    {
        return $this->hasMany(ElectionVote::class, 'election_school_id', 'id');
    }
}
