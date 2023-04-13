<?php

class Dashboard extends controller
{

    // public function AfficheBlague(){
    //     $user = new BlagueDAO;   
    //     $results = $user->getAllById();
    //     var_dump($results);
    //     $this->set($results);        
    //     $this->render('dashboard_tpl');
    //     echo 'coucou';
    // }

    public function createBlague()
    {
        $user = new BlagueDAO;

        if ($user->insert_blague($_POST)) {
            $info['message'] = ['msg' => "Bienvenue sur ton espace personnel " . $_SESSION['nickname'] . " "];
            $info1['message1'] = ['msg1' => "Blagues ajoutées"];
            $this->set($info);
            $this->set($info1);
            $this->render('dashboard_tpl');


        }
    }

    public function suppBlague($req)
    {
        $user = new BlagueDAO;

        if ($user->delete_blague($req)) {
            $info['message'] = ['msg' => "Bienvenue sur ton espace personnel " . $_SESSION['nickname'] . " "];
            $info1['message1'] = ['msg1' => "Blague supprimée."];
            $this->set($info);
            $this->set($info1);
            $this->render('dashboard_tpl');
        }
    }

    public function updateBlague($req)
    {
        echo "<form method='post' action=''>
        <input type='text' name='newtitle' placeholder='nouveau titre'><br>
        <textarea type='text' name='newdesc' placeholder='modifier la blague'></textarea>
        <button type='submit'>Valider</button>
        </form>";

        $user = new BlagueDAO;
        
       $user->update_blague($req,$_POST['newdesc'],$_POST['newtitle']);
   
    }
}
