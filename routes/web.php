<?php

use App\Models\Ac;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChartAcController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CctvMonitor1Controller;
use App\Http\Controllers\CctvMonitor2Controller;
use App\Http\Controllers\CctvMonitor3Controller;
use App\Http\Controllers\CctvMonitor4Controller;
use App\Http\Controllers\StockController;
use Illuminate\Routing\Route as RoutingRoute;

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

// Route::get('/', function () {
//     return view('auth.login');
// });



Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'postLogin']);
Route::post('/logout/{id}', [LoginController::class, 'logout']);


Route::get('/dashboard', [ChartAcController::class, 'index'])->middleware('auth');
Route::post('/dashboard', [ChartAcController::class, 'getChart'])->middleware('auth');
Route::get('/dashboard/charts', [ChartAcController::class, 'dataChart'])->middleware('auth');

Route::post('/dashboard/charts/createChart', [ChartAcController::class, 'tambahDataChart']);

Route::post('/dashboard/charts/updateChart', [ChartAcController::class, 'updateDataChart']);

// Route::get('/dashboard/charts/update', [ChartAcController::class, 'updateViewChartAc'])->middleware('auth');


Route::delete('/dashboard/charts/delete/{id}', [ChartAcController::class, 'deleteDataChartAc'])->middleware('auth');


// Route AC
Route::get('/ac', [AcController::class, 'index'])->middleware('auth');
Route::get('/ac/create', [AcController::class, 'create'])->middleware('auth');
Route::post('/ac/create', [AcController::class, 'store'])->middleware('auth');
Route::get('/ac/delete/{id}', [AcController::class, 'destroy'])->name('delete')->middleware('auth');
Route::get('/ac/update/{id}', [AcController::class, 'show'])->middleware('auth');
Route::post('/ac/update/{id}', [AcController::class, 'update'])->middleware('auth');
Route::get('/ac/trash', [AcController::class, 'trash'])->middleware('auth');
Route::get('/ac/trash/deleteAll', [AcController::class, 'deleteAll'])->middleware('auth');
Route::get('/ac/export', [AcController::class, 'exportDataAc'])->middleware('auth');
Route::delete('/selectedac', [AcController::class, 'deleteCheckedAc'])->name('ac.deleteSelected')->middleware('auth');
Route::delete('ac/trash/{id}', [AcController::class, 'restore'])->middleware('auth');
Route::get('/dashboard/range/ac/{nilai}', [AcController::class, 'queryRangeAc'])->middleware('auth');


// Route Note AC
Route::resource('/ac/note', NoteController::class)->middleware('auth');


Route::resource('/dashboard/users', AdminController::class)->middleware('admin');
Route::delete('dashboard/users/delete/{id}', [AdminController::class, 'destroy'])->middleware('admin');




Route::get('/error', [AdminController::class, 'errorPage']);




// CCTV Monitor 1
Route::resource('/dashboard/cctv', CctvMonitor1Controller::class)->middleware('auth');

Route::get('/dashboard/trashed/cctv', [CctvMonitor1Controller::class, 'trash'])->middleware('auth');

Route::delete('/dashboard/cctv/trash/{id}', [CctvMonitor1Controller::class, 'restoreDataCctv1'])->middleware('auth');

Route::get('/dashboard/cctv/trash/deleteAll', [CctvMonitor1Controller::class, 'deleteAll'])->middleware('auth');

Route::get('/dashboard/export/cctv', [CctvMonitor1Controller::class, 'exportDataCctv1'])->middleware('auth');

Route::get('/dashboard/range/cctv/{nilai}', [CctvMonitor1Controller::class, 'queryRange'])->middleware('auth');


// CCTV Monitor 2
Route::resource('/dashboard/cctv2', CctvMonitor2Controller::class)->middleware('auth');

Route::get('/dashboard/trashed/cctv2', [CctvMonitor2Controller::class, 'trash'])->middleware('auth');

Route::delete('/dashboard/cctv2/trash/{id}', [CctvMonitor2Controller::class, 'restoreDataCctv2'])->middleware('auth');

Route::get('/dashboard/cctv2/trash/deleteAll', [CctvMonitor2Controller::class, 'deleteAllCctv2'])->middleware('auth');

Route::get('/dashboard/export/cctv2', [CctvMonitor2Controller::class, 'exportDataCctv2'])->middleware('auth');

Route::get('/dashboard/range/cctv2/{nilai}', [CctvMonitor2Controller::class, 'queryRangeCctv2'])->middleware('auth');




// CCTV Monitor 3
Route::resource('/dashboard/cctv3', CctvMonitor3Controller::class)->middleware('auth');

Route::get('/dashboard/trashed/cctv3', [CctvMonitor3Controller::class, 'trash'])->middleware('auth');

Route::delete('/dashboard/cctv3/trash/{id}', [CctvMonitor3Controller::class, 'restoreDataCctv3'])->middleware('auth');

Route::get('/dashboard/cctv3/trash/deleteAll', [CctvMonitor3Controller::class, 'deleteAll'])->middleware('auth');

Route::get('/dashboard/range/cctv3/{nilai}', [CctvMonitor3Controller::class, 'queryRangeCctv3'])->middleware('auth');

Route::get('/dashboard/export/cctv3', [CctvMonitor3Controller::class, 'exportDataCctv3'])->middleware('auth');



// CCTV Monitor 4
Route::resource('/dashboard/cctv4', CctvMonitor4Controller::class)->middleware('auth');

Route::get('/dashboard/trashed/cctv4', [CctvMonitor4Controller::class, 'trash'])->middleware('auth');

Route::delete('/dashboard/cctv4/trash/{id}', [CctvMonitor4Controller::class, 'restoreDataCctv4'])->middleware('auth');

Route::get('/dashboard/cctv4/trash/deleteAll', [CctvMonitor4Controller::class, 'deleteAll'])->middleware('auth');

Route::get('/dashboard/export/cctv4', [CctvMonitor4Controller::class, 'exportDataCctv4'])->middleware('auth');

Route::get('/dashboard/range/cctv4/{nilai}', [CctvMonitor4Controller::class, 'queryRangeCctv4'])->middleware('auth');


// Settings
Route::get('/settings/profile', [SettingsController::class, 'index'])->middleware('auth');
Route::post('/settings/profile/{id}', [SettingsController::class, 'updateUserAccount'])->middleware('auth');
Route::get('/settings/changepassword', [SettingsController::class, 'changePassword'])->middleware('auth');
Route::post('/settings/changepassword/{id}', [SettingsController::class, 'postChangePassword'])->middleware('auth');

Route::get('/ac/koderror', function () {
    return view('koderror', [
        'title' => 'All kode error'
    ]);
});


// Tools
Route::get('/tools/konver-cosine', function () {
    return view('tools.konver-cosine', [
        'title' => 'Kalkulator Cos'
    ]);
});

Route::get('/tools/amper-to-va', function () {
    return view('tools.amptova', [
        'title' => 'Convert Amper To Volt Amper'
    ]);
});

Route::get('/tools/watt-to-va', function () {
    return view('tools.wattova', [
        'title' => 'Convert Watt To VA'
    ]);
});

Route::get('/tools/konsumsi-energi', function () {
    return view('tools.konsumsi-energy', [
        'title' => 'Konsumsi Energi'
    ]);
});

Route::get('/tools/btu-to-pk', function () {
    return view('tools.btutopk', [
        'title' => 'Konversi Btu to PK'
    ]);
});

Route::get('/tools/amper-to-watt', function () {
    return view('tools.amper-to-watt', [
        'title' => 'Konversi Amper to Watt'
    ]);
});

Route::get('/tools/watt-to-amper', function () {
    return view('tools.watt-to-amper', [
        'title' => 'Konversi Watt to Amper'
    ]);
});

Route::get('/tools/ohm-law', function () {
    return view('tools.ohm-law', [
        'title' => 'Ohm Law'
    ]);
});

Route::get('/tools/voltage-divider', function () {
    return view('tools.voltage-divider', [
        'title' => 'Voltage Divider Calculator'
    ]);
});

Route::get('/tools/celcius-fahrenheit', function () {
    return view('tools.celcius-to-fahrenheit', [
        'title' => 'Konversi celcius to fahrenheit'
    ]);
});

Route::get('/tools/watt-to-btu', function () {
    return view('tools.watt-to-btu', [
        'title' => 'Watt To Btu/h'
    ]);
});

Route::get('/tools/btu-to-watt', function () {
    return view('tools.btu-to-watt', [
        'title' => 'Btu/h To Watt'
    ]);
});

Route::get('/tools/watts-to-kWh', function () {
    return view('tools.watts-to-kWh', [
        'title' => 'Watts To kWh'
    ]);
});

Route::get('/tools/joules-to-watt', function () {
    return view('tools.joules-to-watt', [
        'title' => 'Joules To Watt'
    ]);
});



// Stock Barang
Route::resource('/dashboard/stock', StockController::class)->middleware('auth');



// Tools
Route::get('/teknik/listrik', function () {
    return view('teknik.listrik', [
        'title' => "Teknik Listrik"
    ]);
})->middleware('auth');

Route::get('/teknik/pendingin', function () {
    return view('teknik.pendingin', [
        'title' => "Teknik Pendingin"
    ]);
})->middleware('auth');

Route::get('/teknik/mesin', function () {
    return view('teknik.mesin', [
        'title' => "Teknik Mesin"
    ]);
})->middleware('auth');
