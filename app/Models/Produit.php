<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model
{
    /** @use HasFactory<\Database\Factories\ProduitFactory> */
    use HasFactory;

    protected $fillable = [
    'name',
    'prix',
    'description',
    'image',
    'stock',
    'categorie_id'
    ];

           public function categorie():BelongsTo
       {
           return $this->belongsTo(Categorie::class);
       }

          public function favorite():BelongsToMany{
           return $this->belongsToMany(User::class);
       }

         public function user():BelongsToMany{
        return $this->belongsToMany(User::class,'commades');
     }


}
