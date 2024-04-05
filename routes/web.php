<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('login-user/{email}',function(Request $request,String $email){
    if (! $request->hasValidSignature()) {
        abort(401);
    }
    $user=User::where('email',$email)->first();
    Auth::login($user);
    $request->session()->regenerate();
    return redirect()->intended('dashboard');

})->name('userlogin');

require __DIR__.'/auth.php';
