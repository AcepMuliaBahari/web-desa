<?php

use App\Http\Controllers\HomeController as BaseHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicServiceController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\PotentialController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\VillageOfficialController;
// use App\Http\Controllers\LetterController;
// use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\FinanceReportController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PPIDController;
use App\Http\Controllers\PengaduanController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CitizenController;
use App\Http\Controllers\Admin\ComplaintController as AdminComplaintController;
use App\Http\Controllers\Admin\PublicServiceController as AdminPublicServiceController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\VillageProfileController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\VillageRegulationController;
use App\Http\Controllers\Admin\AdminStatisticsController;
use App\Http\Controllers\Admin\LetterController;
use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\SettingsController;

use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\RegulationController;

Route::get('/', function () {
    $officials = VillageOfficialController::getActiveOfficials();
    return view('desa', compact('officials'));
})->name('desa');

Route::get('/profil', function () {
    $officials = VillageOfficialController::getActiveOfficials();
    return view('profile.index', compact('officials'));
})->name('profile');

// PPID Routes
Route::get('/ppid', [PPIDController::class, 'index'])->name('ppid.index');

// Pengaduan

Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');

// Organization Routes
Route::get('/organisasi', [VillageOfficialController::class, 'organization'])->name('organization.index');

Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');
Route::get('/umkm/{umkm}', [UmkmController::class, 'show'])->name('umkm.show');

// Public Routes
Route::name('regulations.')->group(function() {
    Route::get('regulations', [RegulationController::class, 'index'])->name('index');
    Route::get('regulations/{id}', [RegulationController::class, 'show'])->name('show');
    Route::get('regulations/{id}/download', [RegulationController::class, 'download'])->name('download');
});
Route::group([], function() {
    // News Routes
    Route::get('/news', [NewsController::class, 'publicIndex'])->name('news.index');
    Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

    // Events Routes
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

    // Public Services Routes
    Route::get('/public-services', [PublicServiceController::class, 'index'])->name('public-services.index');
    Route::get('/public-services/{id}', [PublicServiceController::class, 'show'])->name('public-services.show');

    // Village Profile Routes
    Route::get('/village-profile', [VillageProfileController::class, 'publicIndex'])->name('village-profile.index');

    // Public Pages
    Route::get('/surat', [LetterController::class, 'publicIndex'])->name('letters.public');

    // Village Regulations Routes

});

// Authentication Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User Dashboard Route
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/complaints', [\App\Http\Controllers\ComplaintController::class, 'index'])->name('complaints.index');
    Route::get('/complaints/create', [\App\Http\Controllers\ComplaintController::class, 'create'])->name('complaints.create');
    Route::post('/complaints', [\App\Http\Controllers\ComplaintController::class, 'store'])->name('complaints.store');
    Route::get('/complaints/{complaint}/edit', [\App\Http\Controllers\ComplaintController::class, 'edit'])->name('complaints.edit');
    Route::get('/complaints/{complaint}', [\App\Http\Controllers\ComplaintController::class, 'show'])->name('complaints.show');
        Route::put('/complaints/{complaint}', [\App\Http\Controllers\ComplaintController::class, 'updateUser'])->name('complaints.update');

    // Untuk user
    Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])
        ->name('complaints.destroy')
        ->middleware('auth');

    // Route::get('/pengaduan', function () {
    //     return view('pengaduan');
    // })->name('pengaduan.index');
});

require __DIR__.'/auth.php';

// Home route untuk user biasa

// Admin Routes
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Perbaiki urutan route citizens
        Route::get('citizens/export', [CitizenController::class, 'export'])->name('citizens.export');
        Route::post('citizens/import', [CitizenController::class, 'import'])->name('citizens.import');
        Route::get('citizens/print', [CitizenController::class, 'print'])->name('citizens.print');
        Route::resource('citizens', CitizenController::class);

        // Hapus route yang redundant
        Route::get('/citizens/{citizen}', [CitizenController::class, 'show'])->name('admin.citizens.show');

});

// Grup route untuk admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::resource('complaints', AdminComplaintController::class);
    Route::post('complaints/{complaint}/respond', [AdminComplaintController::class, 'respond'])
        ->name('complaints.respond');
    Route::get('complaints/print', [AdminComplaintController::class, 'print'])->name('complaints.print');
    Route::get('complaints/{complaint}/print', [AdminComplaintController::class, 'print'])->name('complaints.print.single');

});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('regulations', VillageRegulationController::class);

    Route::get('regulations/{regulation}/download', [VillageRegulationController::class, 'download'])
        ->name('regulations.download');

        Route::resource('village-regulations', VillageRegulationController::class);
        Route::get('village-regulations/{regulation}/download', [VillageRegulationController::class, 'download'])
            ->name('village-regulations.download');
        Route::resource('letters', \App\Http\Controllers\Admin\LetterController::class);
        Route::get('letters/{letter}/download', [\App\Http\Controllers\Admin\LetterController::class, 'download'])
            ->name('letters.download');
        Route::post('letters/{letter}/approve', [\App\Http\Controllers\Admin\LetterController::class, 'approve'])->name('letters.approve');
        Route::post('letters/{letter}/reject', [\App\Http\Controllers\Admin\LetterController::class, 'reject'])->name('letters.reject');
    // Route untuk laporan keuangan
    Route::resource('finances', FinanceController::class);
    Route::get('finances/{finance}/download', [FinanceController::class, 'download'])
        ->name('finances.download');
    Route::resource('news', AdminNewsController::class);

    Route::get('village-profile', [VillageProfileController::class, 'index'])->name('village-profile.index');
    Route::get('village-profile/edit', [VillageProfileController::class, 'edit'])->name('village-profile.edit');
    Route::put('village-profile', [VillageProfileController::class, 'update'])->name('village-profile.update');
    Route::resource('public-services', \App\Http\Controllers\Admin\PublicServiceController::class);
    Route::resource('archives', ArchiveController::class);
    Route::get('archives/{archive}/download', [ArchiveController::class, 'download'])->name('archives.download');
    Route::resource('events', \App\Http\Controllers\Admin\EventController::class);
    Route::resource('organizations', \App\Http\Controllers\Admin\OrganizationController::class);
    Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
    // UMKM Routes
    Route::resource('umkm', \App\Http\Controllers\Admin\UmkmController::class);

    // Development Routes
    Route::resource('developments', \App\Http\Controllers\Admin\DevelopmentController::class);
    Route::resource('village-officials', \App\Http\Controllers\Admin\VillageOfficialController::class);
});

// Public Routes untuk surat
Route::middleware('auth')->group(function() {
    Route::get('/letters', [LetterController::class, 'index'])->name('letters.index');
    Route::get('/letters/create', [LetterController::class, 'create'])->name('letters.create');
    Route::post('/letters', [LetterController::class, 'store'])->name('letters.store');
    Route::get('/letters/{letter}', [LetterController::class, 'show'])->name('letters.show');
    Route::get('/letters/{letter}/download', [LetterController::class, 'download'])
        ->name('letters.download');
});

Route::get('/potensi', [PotentialController::class, 'index'])->name('potentials.index');
Route::get('/potensi/gallery/{gallery}', [PotentialController::class, 'showGallery'])->name('potentials.gallery.show');
Route::get('/potensi/{potensi}', [PotensiController::class, 'show'])->name('potensi.show');

// Village Profile Routes
Route::prefix('admin/village-profile')->name('admin.village-profile.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [VillageProfileController::class, 'index'])->name('index');
    Route::get('/structure', [VillageProfileController::class, 'structure'])->name('structure');
    Route::post('/structure', [VillageProfileController::class, 'updateStructure'])->name('structure.update');
    Route::get('/vision-mission', [VillageProfileController::class, 'visionMission'])->name('vision-mission');
    Route::post('/vision-mission', [VillageProfileController::class, 'updateVisionMission'])->name('vision-mission.update');
});
// Route statistik admin
Route::prefix('admin/statistics')->name('admin.statistics.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminStatisticsController::class, 'index'])->name('index');
    Route::get('/penduduk', [AdminStatisticsController::class, 'penduduk'])->name('penduduk');
    Route::post('/penduduk', [AdminStatisticsController::class, 'updatePenduduk'])->name('penduduk.update');
    Route::get('/apbdes', [AdminStatisticsController::class, 'apbdes'])->name('apbdes');
    Route::post('/apbdes', [AdminStatisticsController::class, 'updateApbdes'])->name('apbdes.update');
    Route::get('/idm', [AdminStatisticsController::class, 'idm'])->name('idm');
    Route::post('/idm', [AdminStatisticsController::class, 'updateIdm'])->name('idm.update');
    Route::get('/sdgs', [AdminStatisticsController::class, 'sdgs'])->name('sdgs');
    Route::post('/sdgs', [AdminStatisticsController::class, 'updateSdgs'])->name('sdgs.update');
});

// Route untuk halaman statistik
Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');

// User Routes
