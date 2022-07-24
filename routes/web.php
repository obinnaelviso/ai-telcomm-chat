<?php

use App\Http\Controllers\BotController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Group all routes that require authentication
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    Route::get('/manage-bot', [BotController::class, 'index'])->name('manage-bot');

    // Manage Response
    Route::post('/manage-bot/response', [BotController::class, 'storeResponse'])->name('manage-bot.response');
    Route::put('/manage-bot/response/{botResponse}', [BotController::class, 'updateResponse'])->name('manage-bot.response');
    Route::delete('/manage-bot/response/{botResponse}', [BotController::class, 'destroyResponse'])->name('manage-bot.response');

    // Manage Query
    Route::post('/manage-bot/response/{botResponse}/query', [BotController::class, 'storeQuery'])->name('manage-bot.query');
    Route::put('/manage-bot/response/query/{botQuery}', [BotController::class, 'updateQuery'])->name('manage-bot.query.update');
    Route::delete('/manage-bot/response/query/{botQuery}', [BotController::class, 'destroyQuery'])->name('manage-bot.query.delete');
});



require __DIR__ . '/auth.php';
