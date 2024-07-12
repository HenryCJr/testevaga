<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;


Route::resource('contatos', ContatoController::class);

Route::get('/contatos/remover/{id}', [ContatoController::class, 'destroy']);

//Tentei fazer de outra forma no início, mas alguns métodos de vídeos eram desatualizados demais pra me ajudar

// Route::prefix('contatos')->group(function(){
//     Route::get('create', function(){
//         return view('create');
//     });
    
//     Route::get('listar', function(){
//         return view('index');
//     });
    
//     Route::get('show/{id?}', function($id = 0){
//         return view('update');
//     });
// });






