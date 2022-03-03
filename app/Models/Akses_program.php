<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akses_program extends Model
{
    use HasFactory;
    protected $table = 'akses_program';
    protected $fillable = [
        'user_id',
        'program_id',
    ];

    protected $casts = [ 
        'user_id' => 'integer', 
        'program_id' => 'integer',];

    protected $primaryKey = 'id';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function akses_divisi()
    {
        return $this->belongsTo(Akses_divisi::class, 'user_id', 'user_id');
    }
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }
}
