<?php

namespace useredit\laravelui;

use Illuminate\Console\Command;
use File;
class UserEditCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'useredit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CreateUserEdit&Withdrawal';


    protected $views = [
        'auth/UserEdit.stub' =>'auth/UserEdit.blade.php',
        'auth/WithdrawalForm.stub' =>'auth/WithdrawalForm.blade.php',
    ];

    protected $requests = [
        'ChangePasswordRequest.stub' =>'ChangePasswordRequest.php',
        'UpdateEmailRequest.stub' =>'UpdateEmailRequest.php',
        'WithdrawalRequest.stub' =>'WithdrawalRequest.php',
    ];
    /**
     * Create a new command instance.
     *
     * @return void
     */


    public function handle()
    {

        $this->exportRequests();

        $this->exportViews();

        $this->exportBackend();
        

        $this->info('sucsess!');
    }



    protected function exportRequests(){
        if(!file_exists(app_path('Http/Requests'))){
            mkdir(app_path('Http/Requests'));
        }
        foreach ($this->requests as $key => $value) {     
            file_put_contents(
                app_path('Http/Requests/'.$value),
                $this->compileRequestStub($key)
            );
        }
    }


    protected function exportViews()
    {
        
        foreach ($this->views as $key => $value) {
            $view = $this->getViewPath($value);
            
            copy(
                __DIR__.'/Auth/'.$key,
                $view
            );
        }
    }

    protected function exportBackend()
    {
        file_put_contents(
            app_path('Http/Controllers/Auth/UserEditController.php'),
            $this->compileControllerStub()
        );
        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__.'/Auth/auth/routes.stub'),
            FILE_APPEND
        );

    }

    
    protected function compileRequestStub($key)
    {
        
        return str_replace(
            '{{namespace}}',
            $this->laravel->getNamespace(),
            file_get_contents(__DIR__.'/Auth/auth/Request/'.$key)
        );
    }

    protected function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            $this->laravel->getNamespace(),
            file_get_contents(__DIR__.'/Auth/auth/UserEditController.stub')
        );
    }


    protected function getViewPath($path)
    {
        return implode(DIRECTORY_SEPARATOR, [
            config('view.paths')[0] ?? resource_path('views'), $path,
        ]);
    }

}
