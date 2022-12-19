<html>
    <head>
        <title>inscription</title>
    </head>
    <body>
        <form method="POST" action="insert.php" enctype="multipart/form-data" >
            <p>nom et prenom</p>
            <input type="text" name="nom" id="nom" value="" required>
            <p>adress mail</p>
                <input type="email" name="mail" id="mail" value="" required>
            <p>Numero de telephone</p>
                <input type="tel" name="tel" id="tel" value="" required>
            <p>adresse</p>
                <input type="text" name="adr" id="adr" value="" required>
            </br></br>
          <!--  <label for="type">vous-etes ?</label>
                <select name="type" id="">
                <option value="participant">participant</option>
                <option value="formateur">formateur</option>
                <option value="speaker">conferencier</option>
                </select> -->
            </br>
            <p>inserer votre photo</p>
            <input class="form-control" type="file" name="uploadfile" value="" required/>
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