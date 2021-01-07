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
    protected $description = 'hahahahahahah';


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
        

        $this->info('できたンゴ.');
    }



    protected function exportRequests(){
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
            
        }
    }

    protected function exportBackend()
    {
        file_put_contents(
            app_path('Http/Controllers/Auth/UserEditController.php'),
            $this->compileControllerStub()
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
