<html>
    <head>
        <title>inscription</title>
    </head>
    <body>
        <form method="POST" action="ajout.php" enctype="multipart/form-data" >
            <p>nom et prenom</p>
            <input type="text" name="nom" id="nom" value="" required>
            <p>adress mail</p>
                <input type="email" name="mail" id="mail" value="" required>
            </br></br>
          <label for="type">vous-etes ?</label>
                <select name="type" id="type" required>
                <option value="formateur">formateur</option>
                <option value="speaker">conferencier</option>
                </select> 
            </br>
            <p>nom d'utilisateur</p>
                <input type="text" name="username" id="username" value="" required>
            <p>mot de passe</p>
                <input type="text" name="pass" id="pass" value="" required>
            <!-- <p>verifier mot de passe</p>
                <input type="password" name="password" id="password" value="" > -->
            </br></br>
                <input type="hidden" name="langue" value="fr">
                <input type="submit" name="connect" id="" value="Se Connecter">
                <input type="reset" name="annule" id="" value="Annuler">
        </form>
    </body>
</html>