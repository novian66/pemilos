<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama', 'adress', 'email', 'phone', 'status', 'user_id', 'token', 'logo'
    ];

    public function election()
    {
        return $this->hasMany(ElectionSchool::class, 'school_id');
    }

    public function candidate()
    {
        return $this->hasMany(ElectionSchoolCandidate::class, 'school_id');
    }
    public function quickcount()
    {
        return $this->hasMany(ElectionVote::class, 'school_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
