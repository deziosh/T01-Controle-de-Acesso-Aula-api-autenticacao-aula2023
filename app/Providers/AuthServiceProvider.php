<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\Noticia;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        //Noticia::class => 'App\Policies\TestePolicy',
        Noticia::class => 'App\Policies\NoticiaPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void 
     */
    public function boot()
    {
        $this->registerPolicies();

        /*
        Gate::before(function($user){
            if($user->admin === 1){
                return true;
            }
        });
        */
        /*
        Gate::define('excluir-noticia', function (User $user, Noticia $noticia){
            return $user->id === $noticia->user_id;
        });

        Gate::define('visualizar-noticia', function (User $user, Noticia $noticia){
            return $user->id === $noticia->user_id;
        });

        Gate::define('editar-noticia', function (User $user, Noticia $noticia){
            return $user->id === $noticia->user_id;
        });

        Gate::define('criar-noticia', function(User $user){
            return ($user->admin <= 1);
        });
        */

    }
}
