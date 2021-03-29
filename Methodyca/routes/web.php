<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/admin', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/edit-topic', function () {
    return Inertia::render('ResearchTopics/EditTopic');
})->name('edit-topic');

//Public Web
Route::get('/', function () {
    return Inertia::render('Main/Home');
})->name('home');
Route::get('/game', function () {
    return Inertia::render('Main/Game');
})->name('game');
Route::get('/mini-games', function () {
    return Inertia::render('Main/MiniGames');
})->name('mini-games');
Route::get('/publication', function () {
    return Inertia::render('Main/Publication');
})->name('publication');
Route::get('/database/find', function () {
    return Inertia::render('ResearchTopics/FindTopic');
})->name('find-topic');
Route::get('/database/add', function () {
    return Inertia::render('ResearchTopics/AddTopic');
})->name('add-topic');
Route::get('/database/plan', function () {
    return Inertia::render('ResearchTopics/CreatePlan');
})->name('create-plan');
Route::get('/about', function () {
    return Inertia::render('Main/About');
})->name('about');

//Mini Games
Route::get('/mini-games/questioniser', function () {
    return Inertia::render('MiniGames/Questioniser');
})->name('mg-questioniser');
Route::get('/mini-games/binoculars', function () {
    return Inertia::render('MiniGames/Binoculars');
})->name('mg-binoculars');
Route::get('/mini-games/interview_simulator', function () {
    return Inertia::render('MiniGames/InterviewSim');
})->name('mg-interview-sim');
Route::get('/mini-games/participatory_loop', function () {
    return Inertia::render('MiniGames/ParticipatoryLoop');
})->name('mg-participatory-loop');
Route::get('/mini-games/data-charger', function () {
    return Inertia::render('MiniGames/DataCharger');
})->name('mg-data-charger');
Route::get('/mini-games/jammr', function () {
    return Inertia::render('MiniGames/Jammr');
})->name('mg-jammr');
