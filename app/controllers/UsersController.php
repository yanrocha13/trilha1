<?php
declare(strict_types=1);

namespace Controllers;

use Illuminate\Support\Facades\Crypt;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use League\Route\Http\Exception;
use Models\Users;

class UsersController
{
    /**
     * @param ServerRequestInterface $request
     * @return ServerRequestInterface
     */
    public function create(ServerRequestInterface $request)
    {
        try{
//            $post = json_decode($request->getBody(), true);
//            $teste = Crypt::encrypt($post['email']);
//            $user = Users::create(['username'=>$username,'email'=>$email,'password'=>$password]);
            return $request;
        }catch(Exception $exception){
            return $exception;
        }
    }
}
