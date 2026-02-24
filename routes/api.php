use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/api/users', [UserController::class, 'getUsers']);

Route::get('/api/users-with-nicknames', [UserController::class, 'getUsersWithNicknames']);