<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';
    protected $fillable = [
        'senin',
        'selasa',
        'rabu',
        'kamis',
        'jumat',
        'isVerif',
        'komentar',
        'user_id',
        'divisi_id',
    ];

    protected $casts = [ 
        'user_id' => 'integer',
        'divisi_id' => 'integer' ];

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
