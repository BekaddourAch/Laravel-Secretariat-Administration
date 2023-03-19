<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depart extends Model
{
    use HasFactory;
    
    protected $fillable = array("Num_courie","envoye_a","date_envoi","objet","type_id","fichier");
    public function Type(){
        return $this->belongsTo(Type::class,'type_id');
    }
}
