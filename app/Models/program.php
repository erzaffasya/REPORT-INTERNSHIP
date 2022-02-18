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

    protected $casts = [ 
        'periode_mulai' => 'date',
        'periode_berakhir' => 'date', ];

    protected $primaryKey = 'id';

}
