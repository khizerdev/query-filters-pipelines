<?php

use App\Http\QueryFilters\CreatedAtQueryFilter;
use App\Http\QueryFilters\UnsolvedQueryFilter;
use App\Models\Discussion;

use Illuminate\Routing\Pipeline as RoutingPipeline;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $discussions = app(RoutingPipeline::class)
                    ->send(Discussion::query())
                    ->through([
                        UnsolvedQueryFilter::class,
                        CreatedAtQueryFilter::class,
                    ])
                    ->thenReturn()
                    ->get();

    // dd($discussions);

    return view('welcome' , compact('discussions'));
});
