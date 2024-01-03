<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peserta;

class Ijazah extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function peserta(){
        return $this->belongsTo(Peserta::class ,'id_peserta');
    }
}
