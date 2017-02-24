<?php
/**
 * Created by PhpStorm.
 * User: huiting
 * Date: 2017/2/18
 * Time: 20:36
 */
// 重写登录验证规则
namespace App\Auth;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class MyProvider extends EloquentUserProvider
{

    public function validateCredentials(UserContract $user, array $credentials)
    {

        $plain = $credentials['password'];
        return md5($plain)===$user->getAuthPassword();
       // return $this->hasher->check($plain, $user->getAuthPassword());
    }

}




