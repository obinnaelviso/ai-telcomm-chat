<?php

use App\Http\Controllers\BotController;
use App\Http\Controllers\ChatController;
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

Route::name('chat.')->group(function () {
    Route::get('/', [ChatController::class, 'index'])->name('index');
    Route::get('chat/messages', [ChatController::class, 'messages'])->name('messages');
    Route::post('chat/register', [ChatController::class, 'registerChat'])->name('register');
    Route::post('chat/message', [ChatController::class, 'sendMessage'])->name('message');
    Route::post('chat/end', [ChatController::class, 'endChat'])->name('end');
});

// Group all routes that require authentication
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    Route::get('/manage-bot', [BotController::class, 'index'])->name('manage-bot');

    // Manage Response
    Route::post('/manage-bot/response', [BotController::class, 'storeResponse'])->name('manage-bot.response');
    Route::put('/manage-bot/response/{botResponse}', [BotController::class, 'updateResponse']);
    Route::delete('/manage-bot/response/{botResponse}', [BotController::class, 'destroyResponse']);

    // Manage Query
    Route::post('/manage-bot/response/{botResponse}/query', [BotController::class, 'storeQuery'])->name('manage-bot.query');
    Route::put('/manage-bot/response/query/{botQuery}', [BotController::class, 'updateQuery'])->name('manage-bot.query.update');
    Route::delete('/manage-bot/response/query/{botQuery}', [BotController::class, 'destroyQuery'])->name('manage-bot.query.delete');
});



require __DIR__ . '/auth.php';
