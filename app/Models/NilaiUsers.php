<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiUsers extends Model
{
    use HasFactory;
    protected $table = 'nilai_users';
    protected $guarded = [];

    protected $primaryKey = 'id';



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id', 'id');
    }
}
