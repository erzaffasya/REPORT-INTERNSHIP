<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    use HasFactory;
    protected $table = 'talent';
    protected $fillable = [
        'name'
    ];

    protected $primaryKey = 'id';

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('score');
    }
}
