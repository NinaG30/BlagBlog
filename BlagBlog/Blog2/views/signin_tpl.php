<?php
include('header_tpl.php');
?>

<style>
     @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap');
     
    body {
        background: whitesmoke;   
        font-family: 'Montserrat Alternates', sans-serif;
      
    }

    a {
        display:block;
        text-align:center;
    }
    .flex {
        display:flex;
        justify-content: center;
        align-items: center;
        height: 90vh;
       
    }

    form {
        background:white;
        padding:15px;
    }

    h3{
        padding:10px 0;
    }
    a {

color: white;
text-decoration: none;
text-transform: uppercase;
padding: 5px 10px;
background: #19245c;
}

a:hover {
    color:black;
    background: #c2ddff;
}
</style>
<div class="flex">
<form method="post" action="Signin/record">
    <h3>S'enregistrer</h3>
    <input type="text" name="username" placeholder="Username"><br>
    <input type="text" name="firstname" placeholder="Firstname"><br>
    <input type="text" name="lastname" placeholder="Lastname"> <br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit" class="connect">S'enregistrer</button>
</form>
</div>
<a href="/Blog2">Revenir à la page d'accueil</a>

</body>

</html>