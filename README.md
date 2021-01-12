# useredit-laravelui

## About
this packege provides the functions,to edit and unregiste one user info


## require
・　laravel6.*
・　laravel/ui
・　npm 
・　vue.js
## Install

```
composer require useredit/laravelui
```

## Execute command.
```
php artisan useredit

```

## create these files as follows.

- `app/Http/Requests/ChangePasswordRequest.php`
- `app/Http/Requests/UpdateEmailRequest.php`
- `app/Http/Requests/WithdrawalRequest.php`
- `resources/views/auth/WithdrawalForm.blade.php`
- `resources/views/auth/UserEdit.blade.php`
- `app/Http/Controllers/Auth/UserEditController.php`



## add these code as follows.
- `routes/web.php`
```
    Route::group(['middleware' => ['auth']], function() {    
        
        Route::get('/user', 'Auth\UserEditController@UserEditForm');
        Route::post('/user/edit/email','Auth\UserEditController@EmailUpdate');
        Route::post('/user/edit/password','Auth\UserEditController@PasswordChange');
        Route::get('/user/edit/delete','Auth\UserEditController@WithdrawalForm');
        Route::post('/user/edit/Withdrawal','Auth\UserEditController@Withdrawal');

    });
```




## License
useredit is open-source software licensed under the MIT license.



