<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware('auth.custom')->group(function () {

    Route::get('/list', [ UserController::class, 'list' ]);
    Route::post('/insert', [ UserController::class, 'insert' ]);
    Route::put('/update/{user}', [ UserController::class, 'update' ]);
    Route::delete('/delete/{user}', [ UserController::class, 'delete' ]);

    // TODO: eğer yukarıdakiler gibi sadece "user" ile model binding yapsaydım soft silinen kaydı destroy edemeyecekti. O sebeple bunu özelleştirdim.
    Route::delete('/destroy/{all_user_find}', [ UserController::class, 'destroy' ]);
});
