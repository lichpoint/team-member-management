<?php

namespace App\Models;
use App\Models\Team;
use App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = ['first_name', 'last_name', 'city', 'state', 'country', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'member_project', 'member_id', 'project_id');
    }
}
