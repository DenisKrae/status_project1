<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class site extends Model
{
    use HasFactory;

    protected $table = 'sites';
    protected $primary_key = 'id';
    protected $fillable = ['sites', 'seite_url', 'url_zu_git', 'auftrag', 'kommentare'];
}
