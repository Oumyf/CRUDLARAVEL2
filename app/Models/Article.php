<?php

namespace App\Models;

use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'image', 'date_de_creation', 'is_a_la_une'];

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}

