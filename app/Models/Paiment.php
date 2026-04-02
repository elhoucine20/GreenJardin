<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paiment extends Model
{
    //
    protected $fillable = ['commande_id','methode','montant','status'];

    public function commande():BelongsTo{
        return $this->belongsTo(Commande::class);
    }
}
