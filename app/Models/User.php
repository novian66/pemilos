<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    public function get_user_participant($data=array(),$election_school_id){
        // dd($election_school_id);
        $where = "where 1=1";
        $order="";
        foreach($data as $index => $value){
            if($index == 'school_id' and !empty($value)) $where.=" and ss.school_id = '$value'";
            // elseif($index == 'school_id' and !empty($value)) $where.=" and co.semester_id = '$value'";
            // elseif($index == 'school_year_id' and !empty($value)) $where.=" and co.school_year_id = '$value'";
            // elseif($index == 'code' and !empty($value)) $where.=" and co.code = '$value'";
            // elseif($index == 'course_source_id' and !empty($value)) $where.=" and co.course_source_id = '$value'";
            // elseif($index == 'study_program_id' and !empty($value)) $where.=" and co.study_program_id = '$value'";
            // elseif($index == 'course_id' and !empty($value)) $where.=" and co.course_id = '$value'";
        }
        $q = '
        select us.*, sg.name as school_group_name, CASE
        WHEN ev.id is null THEN "0"
        else "1"
        END as is_voting from users us
        left join (select * from election_votes ev where ev.election_school_id = '.$election_school_id.') as ev on ev.user_id=us.id
        left join user_join_schools ss on ss.user_id=us.id
        left join school_groups sg on sg.id = us.school_group_id
        '.$where;
        // dd($q);
            $result = DB::select($q);

            return $result;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthday',
        'jenis_kelamin',
        'school_group_id',
        'phone',
        'token',
        'nisn',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
