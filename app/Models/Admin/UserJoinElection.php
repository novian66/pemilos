<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJoinElection extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'election_school_id',
        'school_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
