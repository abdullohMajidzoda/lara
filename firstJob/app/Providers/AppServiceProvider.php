<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Position;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
        return Limit::perMinute(30)->by($request->user()?->id ?: $request->ip())->response(function(Request $request, array $headers){
            return response()->json([
                'message' => 'Too Many Attempts'
            ], 429);
        });
        });

        Gate::before(function(User $user){
            if($user->role === 'admin'){
                return true;
            }
        });

        Gate::define('update-position', function(User $user, Position $position){
            return $user->role == 'employer';
        });

        Gate::define('create-position', function(User $user){
            return $user->role == 'employer';
        });

        Gate::define('delete-position', function(User $user, Position $position){
            return $user->role == 'employer';
        });

        Gate::define('apply', function(User $user, Position $position){
            return $user->role == 'applicant';
        });

        Gate::define('applications', function(User $user){
            return $user->role == 'applicant';
        });

        Gate::define('companies', function(User $user){
            return $user->role == 'employer';
        });

        Gate::define('create-company', function(User $user){
            return $user->role == 'employer';
        });

        Gate::define('update-company', function(User $user, Company $company){
            return $user->role == 'employer';
        });

    }
}
