<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/set-cache', function () {
    Cache::put('key-array', ['value-1', 'value-2', 'value-3', 'value-4', 'value-5']);
    Cache::put('key', 'value');
    Cache::put('key-1', 'value-1', 10); //seconds
    Cache::put('key-2', 'value-2', now()->addMinutes(1)); //minutes
    Cache::store('file')->put('key-3', 'value-3'); //drivers change options.
    Cache::set('key-4', 'value-4'); // outra forma de persistência
});

Route::get('/get-cache', function () {
    var_dump(Cache::get('key-array'));
    echo "<br>";
    echo Cache::get('key') . '<br>';
    echo Cache::get('key') . '<br>';
    echo Cache::get('key-1') . '<br>';
    echo Cache::get('key-2') . '<br>';
    echo Cache::store('file')->get('key-3', 'value-3') . '<br>'; //drivers change options. / 'database'
    echo Cache::get('key-4', 'value-4') . '<br>'; // outra forma de persistência
    echo Cache::get('não_existe', 'Meu valor padrão') . "<br>";
    $users =  Cache::get('users', function () {
        return DB::table('users')->orderBy('id', 'ASC')->get('id');
    }) . "<br>";

    var_dump($users);
});


Route::get('/remember', function () {
    // $users =  Cache::get('users', function () {
    //     return DB::table('users')->orderBy('id', 'ASC')->get('id');
    // }). "<br>";

    // var_dump($users);
    // var_dump(Cache::has('users'));

    // $users =  Cache::remember('users', 20, function () {
    //     return DB::table('users')->orderBy('id', 'ASC')->get('id');
    // }) . "<br>";

    var_dump(Cache::get('users'));

    echo"<hr>";

    // $usersForever =  Cache::rememberForever('users-forever', function () {
    //     return DB::table('users')->orderBy('id', 'ASC')->get('id');
    // }) . "<br>";

    var_dump(Cache::get('users-forever'));

    echo"<hr>";
});
