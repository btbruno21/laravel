<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/pagina', function () {
//     return view('pagina');
// });
//rota simples

// Route::view("/pagina", 'pagina', ['x'=>"passando um valor"]);

Route::get('/pagina/{variavel}', function ($variavel) {
    return view('pagina', ['x' => $variavel]);
});