<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\QuestionController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::get('/login', [AuthController::class, "Login"])->name("auth.login");
Route::post('/login/authenticate', [AuthController::class, 'Authenticate'])->name("auth.authenticate");

$rndRoute = "31dsda943dasd4azx2Qesd2123";
Route::get('/register/admin/' . $rndRoute, [AuthController::class, 'ShowAdminRegistration'])->name("auth.show.admin.registration");
Route::post('/register/store/admin/' . $rndRoute, [AuthController::class, 'CreateAccountAdmin'])->name("auth.store.admin.registration");
Route::get('dashboard/overview', [AdminController::class, 'ShowAdminOverview'])->name('admin.dashboard.overview');


Route::get('dashboard/add-question', [QuestionController::class, 'ShowAddQuestion'])->name('admin.dashboard.add-question');
Route::get('/dashboard/questions', [QuestionController::class, 'ShowQuestions'])->name('admin.dashboard.view-question');
Route::post('/dashboard/add-question/store', [QuestionController::class, 'StoreQuestion'])->name('admin.dashboard.store-question');


Route::get('/dashboard/interview-pending',[InterviewController::class, 'ShowPendingInterview']);
Route::get('/dashboard/add-interview', [InterviewController::class, 'ShowViewApplicant']);

Route::get('/exam', [ExamController::class,'ShowExam']);