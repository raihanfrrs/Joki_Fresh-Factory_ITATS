<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::group(['middleware' => ['cekUserLogin:admin']], function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('master/admin', 'master_admin_index');
        Route::get('/dataUser', [AdminController::class, 'dataUser'])->name('dataUser');
    });
});