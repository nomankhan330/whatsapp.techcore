<?php

use App\Http\Controllers\ContactGroupController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ScheduledDetailController;

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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('client', ClientController::class);
    Route::resource('contact_group', ContactGroupController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('template', TemplateController::class);
    Route::resource('scheduled_detail', ScheduledDetailController::class);
    Route::delete('scheduled_detail_message_delete/{id}', [ScheduledDetailController::class, 'deleteMessageBulkDetail'])->name('scheduled_detail_message_delete');
    Route::get('get_broadcast', [MessageController::class, 'broadcast'])->name('get_broadcast');
    Route::get('template_variable', [TemplateController::class, 'templateVariable'])->name('template_variable');
    Route::get('send_single_message', [MessageController::class, 'index'])->name('send_single_message');
    Route::get('send_bulk_message', [MessageController::class, 'sendBulkMessage'])->name('send_bulk_message');
    Route::post('get_template_data', [MessageController::class, 'getTemplateData'])->name('get_template_data');
    Route::get('view_outgoing_messages', [MessageController::class, 'viewOutgoingMessages'])->name('view_outgoing_messages');
    Route::post('message', [MessageController::class, 'store'])->name('message');
});

// Route::resource('client', EFormTypeController::class)->middleware(['permission']);

Route::resource('settings', SettingsController::class);
Route::post('/settings/{id}/updateEmail', [SettingsController::class, 'updateEmail'])->name('updateEmail');
Route::post('/settings/{id}/updatePassword', [SettingsController::class, 'updatePassword'])->name('updatePassword');
require __DIR__.'/auth.php';
