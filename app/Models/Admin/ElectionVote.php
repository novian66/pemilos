<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function recap_by_candidate($election_school_id){
        $q="
            select nama, sg.name as groups, count(ev.id) as voted from election_school_candidates esc
            left join election_votes ev on ev.election_school_candidate_id=esc.id
            left join users us on us.id=ev.user_id
            left join school_groups sg on sg.id=us.school_group_id
            where esc.election_school_id = ".$election_school_id."
            group by nama, sg.name
            ORDER BY esc.urutan   
        ";
        $result = DB::select($q);

        return $result;        
    }
}
