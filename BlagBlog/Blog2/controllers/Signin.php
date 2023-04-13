<?php

class Signin extends controller {
    public function index(){
        $this->render('signin_tpl');
    }

    public function record(){
        $user = new UserDAO;     
      
        if ($user->insert($_POST)){ //$_POST 
            $info['message'] = ['msg' => "Votre compte a été créé. Vous allez être redirigé vers la page d'acccueil pour vous connecter."];
            $this->set($info);        
            $this->render('transi');
            ?><meta http-equiv="refresh" content="5;url= /Blog2"> <?;
        }
        
    }

    public function check(){
        $checkUser = new UserDAO;
        if($checkUser->verify($_POST) === 10){
            $info['message'] = ['msg' => "Bienvenue sur ton espace personnel " .$_SESSION['nickname']. " "];
            $info1['message1'] = ['msg1' => ""];
            $this->set($info);   
            $this->set($info1);     
            $this->render('dashboard_tpl');
            
        }elseif($checkUser->verify($_POST) === 11) {
            trigger_error("Utilisateur inconnu", E_USER_WARNING);
        }elseif($checkUser->verify($_POST) === 12) {
            trigger_error("MDP inconnu", E_USER_WARNING);
        }else{
            trigger_error("Erreur inconnue", E_USER_WARNING);
        }

    }

    
  

 
}