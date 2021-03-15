<?php
use Illuminate\Support\Facades\Route;

// Route::get('greeting', function () {
//     return 'Hi, this is your awesome package! Mcqp';
// });

// Route::get('picmatch/test', 'EdgeWizz\Picmatch\Controllers\PicmatchController@test')->name('test');

Route::post('fmt/mcqpa2/store', 'EdgeWizz\Mcqpa2\Controllers\Mcqpa2Controller@store')->name('fmt.mcqpa2.store');

Route::post('fmt/mcqpa2/update/{id}', 'EdgeWizz\Mcqpa2\Controllers\Mcqpa2Controller@update')->name('fmt.mcqpa2.update');

Route::post('fmt/mcqpa2/csv_upload', 'EdgeWizz\Mcqpa2\Controllers\Mcqpa2Controller@csv_upload')->name('fmt.mcqpa2.csv');

Route::any('fmt/mcqpa2/delete/{id}', 'EdgeWizz\Mcqpa2\Controllers\Mcqpa2Controller@delete')->name('fmt.mcqpa2.delete');

Route::any('fmt/mcqpa2/inactive/{id}',  'EdgeWizz\Mcqpa2\Controllers\Mcqpa2Controller@inactive')->name('fmt.mcqpa2.inactive');
Route::any('fmt/mcqpa2/active/{id}',  'EdgeWizz\Mcqpa2\Controllers\Mcqpa2Controller@active')->name('fmt.mcqpa2.active');