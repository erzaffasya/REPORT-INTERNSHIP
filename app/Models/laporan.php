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
        'user_id',
        'program_id',
    ];

    protected $casts = [ 
        'user_id' => 'integer',
        'program_id' => 'integer' ];

    protected $primaryKey = 'id';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }
}
