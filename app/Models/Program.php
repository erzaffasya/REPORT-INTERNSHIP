<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'program';
    protected $fillable = [
        'judul',
        'detail',
        'periode_mulai',
        'periode_berakhir',
        'status',
    ];

    protected $primaryKey = 'id';

    // public function akses_program()
    // {
    //     return $this->hasMany(Akses_program::class,'program_id', 'id');
    // }

    public function akses_program()
    {
        return $this->belongsToMany(User::class,'akses_program','program_id','user_id');
    }

    public function divisi()
    {
        return $this->hasMany(Divisi::class,'divisi_id','id');
    }
    public function anggota()
    {
        return $this->hasMany(Akses_program::class,'program_id','id');
    }
}
