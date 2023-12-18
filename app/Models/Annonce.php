<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description', 'categorie', 'image', 'prix', 'contact', 'localisation'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
