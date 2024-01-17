<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Member;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function members() {
        return $this->belongsToMany(Member::class, 'member_project', 'project_id', 'member_id');
    }
}
