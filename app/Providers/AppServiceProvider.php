<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;

use \MailchimpMarketing\ApiClient;
use App\Services\MailchimpNewsletter;
use App\Services\NewsletterInterface;

use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->bind(NewsletterInterface::class, function(){
            $client = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us5'
            ]);
            
            return new MailchimpNewsletter($client);
        });
    }
    
    public function boot()
    {
        // Paginator::useBootstrap();

        // user this admin to allow specific actions
        Gate::define('admin', function(User $user){

            return $user->email === 'ebrahemsamer2@gmail.com';

        });

        // register new directive called admin
        Blade::if('admin', function() {
            if(request()->user())
                return request()->user()->can('admin');
            return null;
        });
    }
}
