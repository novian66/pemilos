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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'dontback'])->group(function () {

    // dashboard all users
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // admin settings
    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings');

    // realtime quickcount
    Route::get('quickcount', [App\Http\Controllers\QuickcountController::class, 'index'])->name('quickcount');
    Route::post('quickcount', [App\Http\Controllers\QuickcountController::class, 'quickcount'])->name('hasil');

    // kpu only route
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

    // routing users
    Route::prefix('users')->group(function () {
        Route::get('', [App\Http\Controllers\User\DashoardController::class, 'index'])->name('dashboard');
        Route::post('', [App\Http\Controllers\User\DashoardController::class, 'joinSchool'])->name('user.joinSchool');
        Route::patch('', [App\Http\Controllers\User\DashoardController::class, 'editProfile'])->name('user.editProfile');
    });

    // routing vote
    Route::prefix('vote')->group(function () {
        Route::post('event', [App\Http\Controllers\User\DashoardController::class, 'showSchoolEvent'])->name('user.event');
        Route::get('event/{id}', [App\Http\Controllers\User\DashoardController::class, 'showEventCandidate'])->name('user.election');
        Route::get('/{id}/school/{school_id}/election/{election_id}', [App\Http\Controllers\Admin\VoteController::class, 'voteCandidate'])->name('user.vote');
    });
});
