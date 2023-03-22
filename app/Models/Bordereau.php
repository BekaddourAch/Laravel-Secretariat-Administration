<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bordereau extends Model
{
    use HasFactory;
    protected $fillable = array("Num_courie","emetteur","date_envoi","envoye_a","objet","type_id","bureau_id","date_transfert","obligation_repanse","date_reponse","fichier");
    public function Type(){
        return $this->belongsTo(Type::class,'type_id');
    }
    
    public function Bureau(){
        return $this->belongsTo(Bureau::class,'bureau_id');
    }
}
