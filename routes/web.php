<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

use App\Models\{Role, Permission, User};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/xlupload', [CandidateController::class, 'index'])->name('candidate.index');
    Route::post('/xlupload', [CandidateController::class, 'import'])->name('candidate.import');
});

require __DIR__.'/auth.php';

Route::get('/admin_role', function () {
    $admin = User::whereName('Admin')->with('roles')->first();
    //$admin_role = Role::whereName('Admin')->first();
    //$admin->roles()->attach($admin_role);
    
    // dd($admin->toArray());

    if($admin->hasRole('Admin')){ // check if user has a role
        dd('yes this user has admin');
    }
});

Route::get('/usr_role', function () {
    $staff = User::whereName('User')->with('roles')->first();
    //$staff_role = Role::whereName('Staff')->first();
    //$staff->roles()->attach($staff_role);
    
    // dd($staff->toArray());

    if($staff->hasRole('Staff')){ // check if user has a role
        dd('yes this user has staff permission');
    }

});

Route::get('/add_user_permission', function () {
    // $add_user_permission = Permission::whereName('add_user')->first();
    $add_user_permission = Permission::whereName('view_user')->first();
    $admin_role = Role::whereName('Admin')->with('permissions')->first();
    // $admin_role->permissions()->attach($add_user_permission);
    
    dd($admin_role->toArray());

    // if($admin->hasPermission('add_user')){ // check if role has a permission
    //     dd('yes this role has add_user permission');
    // }

});

Route::get('/see_all_permission', function () {
    // $user = User::with('roles.permissions')->get();
    $user = User::select('id', 'name', 'email')
                ->with(['roles:id,name','roles.permissions:id,name'])
                ->get();
    // dd($user->toArray());

    dd($user[1]->roles->flatMap->permissions->toArray());
});


