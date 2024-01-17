<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('members/add-member', [MemberController::class, 'addMember'])->name('members.add-member');
Route::resource('members', MemberController::class);

Route::resource('team', TeamController::class);
Route::get('project/show-members/{id}', [ProjectController::class, 'getProjectMembers'])->name('project.show-members');
Route::resource('project', ProjectController::class);
