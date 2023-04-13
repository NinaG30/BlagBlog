<?php
include('header_tpl.php');
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap');

    h1,
    a,
    h5,
    p {
        font-family: 'Montserrat Alternates', sans-serif;
    }

    a {

        color: white;
        text-decoration: none;
        text-transform: uppercase;
        padding: 5px 10px;
        background: #19245c;
    }

    a:hover {
        background: white;
        color: black;
    }

    .site_desc {
        background: #19245CB3;
    }

    
    h5 {
       border-bottom:5px solid #19245c;
        

    }
</style>
<div class="container-fluid p-5 bg text-white text-center">
    <div class="flex">
        <div>
            <img src="views/assets/img/img2.png" style="width:150px;height:150px">
            <h1>Bienvenue sur Blagues Blog</h1>
            <p class="site_desc">un site fait par les développeurs web de BeWeb</p>
            <!-- <button type="button" class="button" id="signin">
                    <span>S'inscrire</span>
                </button> -->
            <a href="Signin">S'inscrire</a>
        </div>
        <div>
            <form method="post" action="Signin/check">
                <input type="text" name="nom" placeholder="nom">
                <input type="text" name="mdp" placeholder="mdp">
                <button type="submit" id="btn_connect" class="connect">
                    <span>Se connecter</span>
                </button>
            </form>

        </div>
        <div>
            <input type="search" placeholder="Rechercher">
        </div>
    </div>
</div>

<div class="container mt-1">
    <div class="row">
        <?php
        foreach ($results as $result) {
            echo "<div class='col-sm-4' style='width:32%;margin:5px;background:whitesmoke;border:2px solid black;'>";
            echo "<h5>" . $result['title_blague'] . "</h5>";
            echo "<p style='height:140px'>" . $result['desc_blague'] . " </p>";
            echo "<p style='font-size:13px'> Note : " . $result['rating'] . "</p>";
            echo "<p style='font-size:10px'> Posté le " . $result['date'] . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</div>
</body>

</html>