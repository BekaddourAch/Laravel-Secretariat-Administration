<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bordereau extends Model
{
    use HasFactory;
    protected $fillable = array("Num_courie","emetteur","date_envoi","envoye_a","objet","type","tranfere_a","date_transfert","obligation_repanse","date_reponse","fichier");
}
