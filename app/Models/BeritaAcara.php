<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    use HasFactory;
    protected $table = 'berita_acara';
    protected $guarded = [];

    protected $primaryKey = 'id';


    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id', 'id');
    }
}
