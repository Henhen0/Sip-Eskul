    <?php

    use App\Http\Controllers\DaftarEskulController;
    use App\Http\Controllers\EskulController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\JadwalController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\PenerimaanController;
    use App\Http\Controllers\KartuEskulController;
    use App\Http\Middleware\IsAdminMiddleware;
    use App\Models\DaftarEskul;
    use App\Models\Eskul;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    // Login Admin
    Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('login.admin.form');
    Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');

    // Welcome
    Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

    // Auth
    Auth::routes();

    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Daftar Eskul untuk user
    Route::middleware(['auth'])->group(function () {
        Route::post('/daftar-eskul', [DaftarEskulController::class, 'store'])->name('daftar-eskul.store');
    });

    // Admin routes
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => ['auth', IsAdminMiddleware::class]
    ], function() {
        Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    });

    // Eskul
    Route::resource('eskul', EskulController::class);

    // Jadwal
    Route::resource('jadwal', JadwalController::class);

    // Daftar Eskul
    Route::resource('daftar', DaftarEskulController::class);
    Route::post('/admin/daftar/{id}/setuju', [DaftarEskulController::class, 'setuju'])->name('daftar.setuju');
    Route::post('/admin/daftar/{id}/tolak', [DaftarEskulController::class, 'tolak'])->name('daftar.tolak');

    // Daftar Eskul custom
    Route::get('/daftar-eskul', [DaftarEskulController::class, 'create'])->name('daftar-eskul');
    Route::get('/daftar-eskul/{id}/edit', [DaftarEskulController::class, 'edit'])->name('daftar-eskul.edit');
    Route::put('/daftar-eskul/{id}', [DaftarEskulController::class, 'update'])->name('daftar-eskul.update');
    Route::delete('/daftar-eskul/{id}', [DaftarEskulController::class, 'destroy'])->name('daftar-eskul.destroy');

    // Penerimaan
    Route::resource('penerimaan', PenerimaanController::class);
    Route::post('/penerimaan/store', [PenerimaanController::class, 'store'])->name('penerimaan.store');


    // Kartu Eskul
    Route::get('/kartu-eskul/{daftar}', [KartuEskulController::class, 'index'])
    ->name('kartu.eskul');

    //profile
    Route::get('/profile', function () {
        return view('eskul.profile');
    })->middleware('auth')->name('profile');

