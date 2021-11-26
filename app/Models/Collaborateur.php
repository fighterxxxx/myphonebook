<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborateur extends Model
{
    use HasFactory;
    public function entreprise()
    {
        return  $this->belongsTo(Entreprise::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'civilité',
        'nom',
        'prenom',
        'rue',
        'cp',
        'ville',
        'téléphone',
        'email',
        'entreprise_id'
    ];
}
