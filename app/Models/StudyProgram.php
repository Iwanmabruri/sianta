<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    use HasFactory;
    protected $table = 'program_keahlian';
    protected $guarded= 'id_program_keahlian';
    protected $fillable = [
        'bidang_keahlian',
        'program_keahlian',
        'tahun_dibuat',
        'status'
    ];
}
