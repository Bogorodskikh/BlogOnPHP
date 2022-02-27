<?php
namespace MyProject\Controllers;

use InvalidArgumentException;
use MyProject\Exceptions\InvalidActivateException;
use MyProject\View\View;
use MyProject\Models\Users\User;
use MyProject\Models\Users\UserActivationService;
use MyProject\Services\EmailSender;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Controllers\AbstractController;

class UsersController extends AbstractController
{
    
    public function signUp()
{
    if (!empty($_POST)) {
        try {
            $user = User::signUp($_POST);
        } catch (InvalidArgumentException $e) {
            $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
            return;
        }

        if ($user instanceof User) {
            $code = UserActivationService::createActivationCode($user);

            EmailSender::send($user, 'Активация', 'userActivation.php', [
                'userId' => $user->getId(),
                'code' => $code
            ]);

            $this->view->renderHtml('users/signUpSuccessful.php');
            return;
        }
    }

    $this->view->renderHtml('users/signUp.php');
}



public function activate(int $userId, string $activationCode)
{
    try{
        $user = User::getById($userId);
        if (empty($user))
        {
            throw new InvalidActivateException('Ошибка активации пользователя. Такого пользователя не сущществует');
        }
        $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);
        if($isCodeValid)
        {
           $user -> activate();
           echo 'OK';
           UserActivationService::deleteActivationCode($userId);
        }else {
            throw new InvalidActivateException('ОШИБКА АКТИВАЦИИ. Нет кода активации');
        }
    }
    catch (InvalidActivateException $e){
        $this->view->renderHtml('errors/500.php', ['error' => $e->getMessage()]);  
    }

}

public function login()
{
   
    if (!empty($_POST)){
        try{ 
         $user = User::login($_POST);
         UsersAuthService::createToken($user);
            header('Location: /');
            UsersAuthService::createToken($user);
            exit();
         } catch (InvalidArgumentException $e)  {
            $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
            return;  
    }
} 
    $this->view->renderHtml('users/login.php');

}

public function unlog() : void
{
    UsersAuthService::deleteToken();
    header('Location: /');
    
}
        
    
}
