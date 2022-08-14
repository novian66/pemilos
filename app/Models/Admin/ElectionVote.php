<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'school_id',
        'election_school_id',
        'election_school_candidate_id',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
