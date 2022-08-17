<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth', 'dontback'])->group(function () {

    // dashboard all users
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // realtime quickcount
    Route::get('quickcount', [App\Http\Controllers\QuickcountController::class, 'index'])->name('quickcount');
    Route::post('quickcount', [App\Http\Controllers\QuickcountController::class, 'quickcount'])->name('hasil');

    // kpu only route
    Route::prefix('kpu')->middleware('role:kpu')->group(function () {
        Route::prefix('school')->group(function () {
            // school
            Route::get('', [App\Http\Controllers\Admin\SchoolController::class, 'index'])->name('school.index');
            Route::post('', [App\Http\Controllers\Admin\SchoolController::class, 'import'])->name('school.import');
            Route::get('create', [App\Http\Controllers\Admin\SchoolController::class, 'create'])->name('school.create');
            Route::post('create', [App\Http\Controllers\Admin\SchoolController::class, 'store'])->name('school.store');
            Route::get('view/{id}', [App\Http\Controllers\Admin\SchoolController::class, 'view'])->name('school.view');
            Route::delete('view/{id}', [App\Http\Controllers\Admin\SchoolController::class, 'destroy'])->name('school.destroy');

            // election
            Route::get('view/{id}/election', [App\Http\Controllers\Admin\ElectionSchoolController::class, 'create'])->name('election.create');
            Route::post('view/{id}/election', [App\Http\Controllers\Admin\ElectionSchoolController::class, 'store'])->name('election.store');
            Route::get('view/{id}/election/{election_id}/view', [App\Http\Controllers\Admin\ElectionSchoolController::class, 'view'])->name('election.view');
            Route::patch('view/{id}/election/{election_id}/view', [App\Http\Controllers\Admin\ElectionSchoolController::class, 'update'])->name('election.update');
            Route::delete('view/{id}/election/{election_id}/delete', [App\Http\Controllers\Admin\ElectionSchoolController::class, 'destroy'])->name('election.destroy');

            // candidate election
            Route::get('view/{id}/election/{election_id}/candidate', [App\Http\Controllers\Admin\CandidateElectionController::class, 'create'])->name('candidate.create');
            Route::post('view/{id}/election/{election_id}/candidate', [App\Http\Controllers\Admin\CandidateElectionController::class, 'store'])->name('candidate.store');

            // edit and delete school
            Route::get('edit/{id}', [App\Http\Controllers\Admin\SchoolController::class, 'edit'])->name('school.edit');
            Route::patch('edit/{id}', [App\Http\Controllers\Admin\SchoolController::class, 'update'])->name('school.update');
            // Route::delete('delete/{id}', [App\Http\Controllers\Admin\SchoolController::class, 'destroy'])->name('school.destroy');
        });

        Route::prefix('users')->group(function () {
            Route::get('', [App\Http\Controllers\Admin\UserConroller::class, 'index'])->name('users.all');
            Route::get('role/{role}', [App\Http\Controllers\Admin\UserConroller::class, 'list'])->name('users.list');
            Route::get('/create', [App\Http\Controllers\Admin\UserConroller::class, 'create'])->name('users.create');
            Route::post('/create', [App\Http\Controllers\Admin\UserConroller::class, 'createUser'])->name('users.save');
            Route::delete('/delete/{id}', [App\Http\Controllers\Admin\UserConroller::class, 'deleteUser'])->name('users.delete');
        });

        Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings');
        Route::get('api', [App\Http\Controllers\Api\ResquestApiController::class, 'view'])->name('kpu.api');
        Route::get('api/{id}', [App\Http\Controllers\Api\ResquestApiController::class, 'checkapi'])->name('kpu.api.view');
        Route::post('api/{id}', [App\Http\Controllers\Api\ResquestApiController::class, 'aprove'])->name('kpu.api.acc');
    });

    // routing school
    Route::prefix('school')->middleware('role:school')->group(function () {
        Route::get('', [App\Http\Controllers\School\IndexController::class, 'index'])->name('school-management');
        Route::post('', [App\Http\Controllers\School\IndexController::class, 'store'])->name('daftar-sekolah');
        Route::patch('', [App\Http\Controllers\School\IndexController::class, 'update'])->name('update-sekolah');
        Route::delete('', [App\Http\Controllers\School\IndexController::class, 'destroy'])->name('hapus-sekolah');

        Route::get('/view', [App\Http\Controllers\School\ElectionController::class, 'index'])->name('election-school');
        Route::get('/election', [App\Http\Controllers\School\ElectionController::class, 'create'])->name('buat-election');
        Route::post('/election', [App\Http\Controllers\School\ElectionController::class, 'store'])->name('simpan-election');
        Route::get('/election/{id}', [App\Http\Controllers\School\ElectionController::class, 'view'])->name('lihat-election');
        Route::patch('/election/{id}', [App\Http\Controllers\School\ElectionController::class, 'update'])->name('ganti');
        Route::delete('/election/{id}', [App\Http\Controllers\School\ElectionController::class, 'destroy'])->name('hapus-election');

        Route::get('/election/{id}/candidate', [App\Http\Controllers\School\CandidateController::class, 'create'])->name('candidate-create');
        Route::post('/election/{id}/candidate', [App\Http\Controllers\School\CandidateController::class, 'store'])->name('candidate-store');
        Route::delete('candidate/{id}', [App\Http\Controllers\School\CandidateController::class, 'destroy'])->name('hapus-paslon');

        Route::get('/api', [App\Http\Controllers\Api\ResquestApiController::class, 'index'])->name('school.api');
        Route::post('/api', [App\Http\Controllers\Api\ResquestApiController::class, 'store'])->name('request.api');
    });

    // routing users
    Route::prefix('users')->group(function () {
        Route::get('', [App\Http\Controllers\User\DashoardController::class, 'index'])->name('dashboard');
        Route::post('', [App\Http\Controllers\User\DashoardController::class, 'joinSchool'])->name('user.joinSchool');
        Route::patch('', [App\Http\Controllers\User\DashoardController::class, 'editProfile'])->name('user.editProfile');
    });

    // routing vote
    Route::prefix('vote')->group(function () {
        Route::post('event', [App\Http\Controllers\User\DashoardController::class, 'showSchoolEvent'])->name('user.event');
        Route::get('event/{election_school_id}', [App\Http\Controllers\User\DashoardController::class, 'showEventCandidate'])->name('user.election');
        Route::get('/{id}/school/{school_id}/election/{election_id}', [App\Http\Controllers\Admin\VoteController::class, 'voteCandidate'])->name('user.vote');
    });
});
