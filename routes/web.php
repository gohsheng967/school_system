<?php

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/principal/menu',[App\Http\Controllers\Principal::class, 'menu'])->name('principal.menu');
Route::get('/principal/view',[App\Http\Controllers\Principal::class, 'view'])->name('principal.view');
Route::post('/principal/view2',[App\Http\Controllers\Principal::class, 'view2'])->name('principal.view2');

Route::get('/principal/add',[App\Http\Controllers\Principal::class, 'add'])->name('principal.add');
Route::post('/principal/save',[App\Http\Controllers\Principal::class, 'save'])->name('principal.save');
Route::get('/principal/edit/{id}',[App\Http\Controllers\Principal::class, 'edit'])->name('principal.edit');
Route::delete('/principal/{id}/ed_delete',[App\Http\Controllers\Principal::class, 'ed_delete'])->name('principal.ed_delete');
Route::post('/principal/ed_create',[App\Http\Controllers\Principal::class, 'ed_create'])->name('principal.ed_create');
Route::patch('/principal/position_upd/{id}',[App\Http\Controllers\Principal::class, 'position_update'])->name('principal.position_update');
Route::post('/principal/position_create',[App\Http\Controllers\Principal::class, 'position_create'])->name('principal.position_create');
Route::get('/principal/course',[App\Http\Controllers\Principal::class, 'course_index'])->name('principal.course_index');
Route::get('/principal/course_edit/{id}',[App\Http\Controllers\Principal::class, 'course_edit'])->name('principal.course_edit');
Route::post('/principal/course_attend',[App\Http\Controllers\Principal::class, 'course_attend'])->name('principal.course_attend');
Route::delete('/principal/course_attend_del',[App\Http\Controllers\Principal::class, 'course_attend_del'])->name('principal.course_attend_del');
Route::get('/principal/promotion',[App\Http\Controllers\Principal::class, 'promotion'])->name('principal.promotion');
Route::post('/principal/promotion_add',[App\Http\Controllers\Principal::class, 'promotion_add'])->name('principal.promotion_add');
Route::get('/principal/promotion/{id}',[App\Http\Controllers\Principal::class, 'promotion_details'])->name('principal.promotion_details');
Route::patch('/principal/promo_edit/{id}',[App\Http\Controllers\Principal::class, 'promotion_edit'])->name('principal.promotion_edit');
Route::delete('/principal/promo_delete/{id}',[App\Http\Controllers\Principal::class, 'promotion_delete'])->name('principal.promotion_delete');
Route::post('/principal/promo/students',[App\Http\Controllers\Principal::class, 'promotion_students'])->name('principal.promotion_students');
Route::get('/principal/promo/students/{id}',[App\Http\Controllers\Principal::class, 'promotion_students_delete'])->name('principal.promotion_students_delete');


Route::get('/academic/menu',[App\Http\Controllers\Academic::class, 'menu'])->name('academic.menu');
Route::get('/academic/add',[App\Http\Controllers\Academic::class, 'add'])->name('academic.add');
Route::post('/academic/create',[App\Http\Controllers\Academic::class, 'create'])->name('academic.create');
Route::get('/academic/edit',[App\Http\Controllers\Academic::class, 'edit'])->name('academic.edit');
Route::get('/academic/edit/{id}',[App\Http\Controllers\Academic::class, 'details'])->name('academic.details');
Route::delete('/academic/primary_prize_del',[App\Http\Controllers\Academic::class, 'primary_prize_del'])->name('academic.primary_prize_del');
Route::post('/academic/primary_prize_create',[App\Http\Controllers\Academic::class, 'primary_prize_create'])->name('academic.primary_prize_create');
Route::get('/academic/juec',[App\Http\Controllers\Academic::class, 'juec'])->name('academic.juec');
Route::post('/academic/juec_import',[App\Http\Controllers\Academic::class, 'juec_import'])->name('academic.juec_import');
Route::post('/academic/jupdate',[App\Http\Controllers\Academic::class, 'juec_update'])->name('academic.juec_update');
Route::get('/academic/suec',[App\Http\Controllers\Academic::class, 'suec'])->name('academic.suec');
Route::post('/academic/suec_import',[App\Http\Controllers\Academic::class, 'suec_import'])->name('academic.suec_import');
Route::post('/academic/supdate',[App\Http\Controllers\Academic::class, 'suec_update'])->name('academic.suec_update');
Route::get('/academic/prize',[App\Http\Controllers\Academic::class, 'prize'])->name('academic.prize');
Route::get('/academic/prize/{id}',[App\Http\Controllers\Academic::class, 'prize_edit'])->name('academic.prize_edit');
Route::post('/academic/prize_save',[App\Http\Controllers\Academic::class, 'prize_save'])->name('academic.prize_save');
Route::post('/academic/prize_addwinner',[App\Http\Controllers\Academic::class, 'prize_addwinner'])->name('academic.prize_addwinner');
Route::delete('/academic/prize_removewinner',[App\Http\Controllers\Academic::class, 'prize_deletewinner'])->name('academic.delete_addwinner');

Route::get('/academic/class',[App\Http\Controllers\Academic::class, 'class_summary'])->name('academic.class_summary');
Route::post('/academic/class_add',[App\Http\Controllers\Academic::class, 'class_add'])->name('academic.class_add');
Route::get('/academic/class_edit/{id}',[App\Http\Controllers\Academic::class, 'class_edit'])->name('academic.class_edit');
Route::patch('/academic/class_save/{id}',[App\Http\Controllers\Academic::class, 'class_save'])->name('academic.class_save');
Route::delete('/academic/class_del/{id}',[App\Http\Controllers\Academic::class, 'class_del'])->name('academic.class_del');


