<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $guarded= 'id_kelas';
    protected $fillable = [
        'nama_kelas',
        'nik_peg',
        'status'
    ];
    // public function employee(){
    //     return $this->belongsTo(Employee::class);
    // }
}
