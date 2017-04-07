<?php

function printLoginForm($askedpage){
    

echo <<<CHAINE_DE_FIN
<html>
 
<head>
  <title>Formulaire de connexion</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>
 
<body>
  <h1>Formulaire de connexion</h1>
 
  <form action="index.php" method="get">
    <input type="text" name="login" placeholder="login" required /><br>
    <input type="password" name="password" placeholder="password" required />
    <p><input type="submit" value="Valider" /></p>
  </form>
</body>
 
</html>
    
CHAINE_DE_FIN;
}
