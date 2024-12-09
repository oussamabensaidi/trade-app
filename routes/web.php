<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\trade_controller;
use App\Http\Controllers\todolistcontroller;


Route::get('/index', [trade_controller::class, 'index'])->name('index');
Route::get('/indexQuick', [trade_controller::class, 'indexQuick'])->name('indexQuick');
Route::get('/completed', [trade_controller::class, 'completed'])->name('completed');
Route::get ('/create',[trade_controller::class, 'create'])->name('create');
Route::post('/create_position', [trade_controller::class, 'create_position'])->name('create_position');
Route::post('/inserquickposition', [trade_controller::class, 'inserquickposition'])->name('inserquickposition');
Route::get ('/complete/{id}',[trade_controller::class, 'complete'])->name('complete');
Route::get ('/complete_quick_page/{id}',[trade_controller::class, 'complete_quick_page'])->name('complete_quick_page');
Route::put ('/complete_quick/{id}',[trade_controller::class, 'complete_quick'])->name('complete_quick');
Route::get('/create_quickPosition/{id}', [trade_controller::class, 'create_quickPosition'])->name('create_quickPosition');
Route::get ('/updateAll/{id}',[trade_controller::class, 'updateAll'])->name('updateAll');
Route::put('/update_position/{id}', [trade_controller::class, 'update_position'])->name('update_position');
Route::put('/update_whole/{id}', [trade_controller::class, 'update_whole'])->name('update_whole');
Route::get('/show/{id}', [trade_controller::class, 'show'])->name('show');
Route::delete('/quick/{id}', [trade_controller::class, 'destroy'])->name('destroy');
Route::put('/livenotes/{id}', [trade_controller::class, 'livenotes'])->name('livenotes');
Route::get('/livenotes_page/{id}', [trade_controller::class, 'livenotes_page'])->name('livenotes_page');
Route::get ('/showquick/{id}',[trade_controller::class, 'showquick'])->name('showquick');


Route::get('/todolist', [todolistcontroller::class, 'index'])->name('todolist');
Route::get('/alltasks', [todolistcontroller::class, 'alltasks'])->name('alltasks');
Route::get('/taskshow/{id}', [todolistcontroller::class, 'taskshow'])->name('taskshow');
Route::get('/history', [todolistcontroller::class, 'history'])->name('history');
Route::post('/fill_todolist', [todolistcontroller::class, 'fill_todolist'])->name('fill_todolist');
Route::post('/taskinsert', [todolistcontroller::class, 'taskinsert'])->name('taskinsert');
Route::post('/TaskCreation', [todolistcontroller::class, 'TaskCreation'])->name('TaskCreation');
Route::put('/TaskUpdate/{id}', [todolistcontroller::class, 'TaskUpdate'])->name('TaskUpdate');
Route::delete('/tasks/{id}', [todolistcontroller::class, 'destroy'])->name('tasks.destroy');
Route::delete('/todolist_delete/{id}', [todolistcontroller::class, 'todolist_delete'])->name('todolist_delete');
Route::get ('/createTask',[todolistcontroller::class, 'createTask'])->name('createTask');
Route::get ('/editTask/{id}',[todolistcontroller::class, 'editTask'])->name('editTask');
Route::get ('/archeive',[todolistcontroller::class, 'archeive'])->name('archeive');
Route::put ('/archeivefunc/{id}',[todolistcontroller::class, 'archeivefunc'])->name('archeivefunc');



