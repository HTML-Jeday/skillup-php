<?php

class AuthController
{

    public function index()
    {
        $smarty = View::getInstance();
        
        $user = $_SESSION['user'] ?? null;
 
        $smarty->display('index.tpl');
    }
    
    public function login()
    {
        $smarty = View::getInstance();
         
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if(strlen($email) < 4 || strlen($password) < 4 ){
    
            die('email or password incorrect');
        }

        $user = UserModel::findByEmail($email);
        
        
   
        if($user == null){
                  
            die('email or password incorrect');
        }
        
        if($email == $user->getEmail() && $password == $user->getPassword()){
            
            $session = Session::init();
            $session->set('user', [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'logged' => true
            ]);
     
            header("Location: /auth");

        }
        
        
       die('email or password incorrect');

        
    }

    public function register()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
 
        if(strlen($email) < 4 || strlen($password) < 4){
            die('email or password are too short');
        }
        
        $user = new UserModel();
        $user->setEmail($email)
            ->setPassword($password, false)
            ->save();
        
        $session = Session::init();
        $session->set('user', [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'logged' => true
        ]);
        
        header("Location: /auth");
        
        
    }

    public function logout()
    {
        $session = Session::init();

        $session->delete('user');

        header("Location: /auth");

    }
    


}