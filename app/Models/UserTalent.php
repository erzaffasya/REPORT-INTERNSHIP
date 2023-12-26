<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTalent extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'talent_user';
    protected $fillable = [
        'user_id',
        'talent_id',
        'score'
    ];

    protected $primaryKey = 'id';
}
