<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = 'divisi';
    protected $fillable = [
        'nama_divisi',
        'detail',
        'status',
        'program_id'
    ];

    protected $primaryKey = 'id';

    // public function akses_divisi()
    // {
    //     return $this->hasMany(Akses_divisi::class,'divisi_id', 'id');
    // }
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }
    public function akses_divisi()
    {
        return $this->belongsToMany(User::class,'akses_divisi','divisi_id','user_id');
    }

    public function akses_program()
    {
        return $this->belongsTo(User::class,'akses_program','program_id','user_id');
    }
}
