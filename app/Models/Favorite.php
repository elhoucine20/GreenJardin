<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $fillable = ['user_id','produit_id'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
