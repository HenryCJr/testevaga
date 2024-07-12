<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;
    protected $table ='contatos';
    //colunas que podem ser alteradas por dados em massa
    protected $fillable=['nm_contato', 'nm_email', 'nm_telefone', 'nm_obs'];
}
