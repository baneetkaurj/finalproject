<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerQuestionPolicies();
        $this->regiserAnswerPolicies();

        //
    }

    public function registerQuestionPolicies()
    {
        Gate::define('create-question', function ($user) {
            return $user->hasAccess(['create-question']);
        });


        Gate::define('edit-question', function ($user) {   //since we are updating the current question, so we need the post model $post
            return $user->hasAccess(['edit-question']) or $user->id == $question->user_id;
        });
        Gate::define('delete-question', function ($user) {
            return $user->hasAccess(['delete-question']);
        });
        Gate::define('view-question', function ($user) {
            return $user->inRole('user');
        });
    }

    public function regiserAnswerPolicies()
    {
        Gate::define('create-answer', function ($user) {
            return $user->hasAccess(['create-answer']);
        });

        Gate::define('edit-answer', function ($user) {
            return $user->hasAccess(['edit-answer']) ;
        });
        Gate::define('delete-answer', function ($user) {
            return $user->hasAccess(['delete-answer']);
        });
        Gate::define('view-answer', function ($user) {
            return $user->inRole('user');
        });
    }
}
