<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $guarded= 'idProdi';
    protected $fillable = [
        'nmProdi',
        'konsKeahlian',
        'thnBuat'
    ];
}
