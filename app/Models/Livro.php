<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    public $timestamps = false;

    protected $table = 'livro';

    public function editora()
    {
        return $this->belongsTo(Editora::class, 'id_editora');
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'livro_autor', 'id_livro', 'id_autor');
    }
}
