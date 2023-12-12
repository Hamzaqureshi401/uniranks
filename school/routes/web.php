<?php

use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\User\UpdateUserEmailController;
use App\Models\Fairs\Fair;
use App\Models\Institutes\School;
use App\Models\Institutes\University;
use App\Models\User;
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
Route::get('locale/{language?}', function ($language = "en") {
    app()->setLocale($language);
    setupLocale($language);
    return Redirect::back();
})->middleware('firewall.all')->name('setLanguage');
Route::middleware(['setup-locale','firewall.all'])->group(function () {
    Route::get('/', function () {
        return redirect('login');
    });
//    Route::get('fix-the-credits',\App\Http\Livewire\FixCreditForSchools::class);
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return redirect('login');
        })->name('dashboard');
    });

    Route::post('get-schools', [SchoolController::class, 'searchSchool'])->name('ajax.get-schools');
    Route::get('check-school', [SchoolController::class, 'checkSchoolAvailability'])->name('ajax.school-availability');

    Route::get('get-login-info/{university}',function (University $university){
        $admin  = User::whereCampusId($university->id)->whereRoleId(\AppConst::UNIVERSITY_ADMINISTRATOR)->first();
        return view('auth.get-login-info',compact('university','admin'));
    })->middleware('signed')->name('getLoginInfo');

    Route::prefix('email')->name('email.')->middleware([ 'auth:sanctum', config('jetstream.auth_session')])->controller(UpdateUserEmailController::class)
        ->group(function (){
            Route::get('update','create')->name('add');
            Route::post('update','store')->name('update');
        });

    if (config('app.env') == 'local') {
        Route::prefix('test')->name('test')->group(function () {
            Route::prefix('notification')->name('notification')->group(function () {
            });
        });
    }


});


