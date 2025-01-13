use App\Http\Controllers\CrewController;

Route::post('/crews', [CrewController::class, 'store']);
Route::get('/crews', [CrewController::class, 'index']);
Route::get('/crews/{id}', [CrewController::class, 'show']);