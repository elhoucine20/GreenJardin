<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Commande extends Model
{
    //
    protected $fillable = ['user_id','produit_id','status','prix','quantity','total'];

    public function produit():BelongsTo{

    return $this->belongsTo(Produit::class);
    }

    public function paiment():HasOne{
        return $this->hasOne(Paiment::class);
    }
}
