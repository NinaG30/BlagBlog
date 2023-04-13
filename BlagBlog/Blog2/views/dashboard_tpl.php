<?php

//a mettre avant tout
//necessaire a l'ouverture de session
//INDISPENSABLE sur tous les scripts qui utilisent la session
//session_start(); - EST DANS INDEX.PHP

// le tab de SUPERGLOBALS $_SESSION stocker les données tant que l'onglet du navigateur reste ouvert

$myvalue = "mystring";

if (empty($_SESSION['page counter'])) {

    $_SESSION['page counter'] = 1;

} else {
    $_SESSION['page counter']++;
}

//DANS UNE AUTRE PAGE : 
// $_SESSION['page counter']++;

include('header_tpl.php');

?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap');

    body {
        margin: 0;
        padding: 0;
        height: 100%;
        display: table;
        width: 100%;

    }

    header {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 20vh;
        background: #19245c;


    }

    h1 {
        font-family: 'Montserrat Alternates', sans-serif;
        color: whitesmoke;

    }

    section {
        padding: 10px;
        text-align: center;
        background: whitesmoke;
    }

    h3 {

        margin: 10px auto;
        border-bottom: 2px solid black;
        width: 500px;
        font-family: 'Montserrat Alternates', sans-serif;

    }

    h4 {
        font-family: 'Montserrat Alternates', sans-serif;
        text-align: left;
    }

    h5 {
        font-family: 'Montserrat Alternates', sans-serif;
        width: 100%;
        padding: 5px;
        background: #19245c;
        color: whitesmoke;
        margin-bottom: 10px;

    }

    input {
        width: 500px;
        margin: 5px 0;
        border: none;
    }

    textarea {
        width: 500px;
        height: 150px;
        border: none;
    }

    .connect {
        font-family: 'Montserrat Alternates', sans-serif;
        width: 500px;
        background: #19245c;
        padding: 5px;
        border: none;
        color:whitesmoke;
    }

    button {
        border: none;
        background: black;
        margin: 5px;
        color: pink;
    }

    .flex {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 10px;


    }

    .blague {
        width: 49%;
        background: white;

    }
</style>
<header>
    <h1>
        <?= $message['msg'] ?>
    </h1>
</header>
<section>
    <h3>Poster une nouvelle blague</h3>
    <form method="post" action="/Blog2/Dashboard/createBlague">
        <input type="text" name="title" placeholder="Le titre de la blague"><br>
        <textarea name="blague" placeholder="le texte de la blague"></textarea><br>
        <button type="submit" id="btn_connect" class="connect">
            <span>Valider</span>
        </button>
    </form>
    <?= $message1['msg1'] ?>

    <h4>Les blagues déjà postées</h4>
    <div class='flex'>
        <?php $blagues = new BlagueDAO;
        $blagues = $blagues->getAllById();    
        ?>
    </div>

</section>


<?php
include('footer_tpl.php');
?>