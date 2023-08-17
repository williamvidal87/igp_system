<?php

use App\Http\Livewire\AdminPanel\Equipment\EquipmentTable;
use App\Http\Livewire\AdminPanel\ManageReservation\ManageBusTable;
use App\Http\Livewire\AdminPanel\ManageReservation\ManageEquipmentTable;
use App\Http\Livewire\AdminPanel\ManageReservation\ManageFacilityTable;
use App\Http\Livewire\AdminPanel\ManageUser\AdminTable;
use App\Http\Livewire\AdminPanel\ManageUser\ClientTable;
use App\Http\Livewire\AdminPanel\SchoolBusRental\SchoolBusRentalTable;
use App\Http\Livewire\AdminPanel\SchoolFacilities\SchoolFacilitiesTable;
use App\Http\Livewire\ClientPanel\BusReservation\BusReservationTable;
use App\Http\Livewire\ClientPanel\EquipmentReservation\EquipmentReservationTable;
use App\Http\Livewire\ClientPanel\FacilitiesReservation\FacilitiesReservationTable;
use App\Http\Livewire\DashBoard\DashBoard;
use App\Http\Livewire\Profile\EditProfileForm;
use App\Http\Livewire\Profile\PasswordUpdate;
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
    // return view('welcome');   
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    
    Route::get('/dashboard', DashBoard::class)->name('dashboard');
    Route::get('/editprofileform', EditProfileForm::class)->name('editprofileform');
    Route::get('/passwordupdate', PasswordUpdate::class)->name('passwordupdate');
    
    //Admin Panel
    Route::get('/admin-table', AdminTable::class)->name('admin-table')->middleware('checkRulepermissionadmin');
    Route::get('/client-table', ClientTable::class)->name('client-table')->middleware('checkRulepermissionadmin');
    Route::get('/school-facilities-table', SchoolFacilitiesTable::class)->name('school-facilities-table')->middleware('checkRulepermissionadmin');
    Route::get('/equipment-table', EquipmentTable::class)->name('equipment-table')->middleware('checkRulepermissionadmin');
    Route::get('/school-bus-table', SchoolBusRentalTable::class)->name('school-bus-table')->middleware('checkRulepermissionadmin');
    Route::get('/manage-facilities-reservation-table',ManageFacilityTable::class)->name('manage-facilities-reservation-table')->middleware('checkRulepermissionadmin');
    Route::get('/manage-equipment-reservation-table',ManageEquipmentTable::class)->name('manage-equipment-reservation-table')->middleware('checkRulepermissionadmin');
    Route::get('/manage-bus-reservation-table', ManageBusTable::class)->name('manage-bus-reservation-table')->middleware('checkRulepermissionadmin');
    
    // Client Panel
    Route::get('/facilities-reservation-table',FacilitiesReservationTable::class)->name('facilities-reservation-table')->middleware('checkRulepermissionclient');
    Route::get('/equipment-reservation-table',EquipmentReservationTable::class)->name('equipment-reservation-table')->middleware('checkRulepermissionclient');
    Route::get('/bus-reservation-table',BusReservationTable::class)->name('bus-reservation-table')->middleware('checkRulepermissionclient');
});
