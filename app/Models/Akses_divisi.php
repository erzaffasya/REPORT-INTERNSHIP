<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akses_divisi extends Model
{
    use HasFactory;
    protected $table = 'akses_divisi';
    protected $fillable = [
        'user_id',
        'divisi_id',
        'akses_proggram_id'
    ];

    protected $casts = [ 
        'user_id' => 'integer', 
        'divisi_id' => 'integer',
        'akses_program_id' => 'integer'];

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
