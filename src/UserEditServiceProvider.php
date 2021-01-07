<?php
namespace useredit\laravelui;

use Illuminate\Support\ServiceProvider;
class UserEditServiceProvider extends ServiceProvider  
{
    /**
     * Register services.
     *
     * @return void
     */

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UserEditCommand::class,
            ]);
        }
    }
}
