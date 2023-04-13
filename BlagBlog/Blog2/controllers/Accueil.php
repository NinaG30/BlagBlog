<?php

class Accueil extends controller {
    public function index(){
        $blague = new BlagueDAO;
        $results['results'] = $blague->getAll();
        // var_dump($results);      
        $this->set($results); // Envoie les résultats du getAll au template accueil
        $this->render('Accueil_tpl'); //Envoie au tpl accueil
    }
}