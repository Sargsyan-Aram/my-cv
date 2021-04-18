<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Localizations\Controllers\LocalizationController;


Route::prefix('localizations')->group(function () {
    Route::get('{locale}/messages', [LocalizationController::class, 'messages']);
});
