<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dbconn = pg_connect("host=localhost dbname=WebsiteLogindb user=postgres password=fantagnomo port=5500") //<- modificare in base al db
            or die("Errore di connessione: ". pg_last_error());
        if ($dbconn) {
            echo "Connesso"; //test
        }
        $email = $_POST["email"];
        $query = "SELECT 1 FROM utente WHERE email=$1";
        $q_result = pg_query_params($dbconn, $query, array($email));
        if ($q_result == false) {
            echo "Errore nell'inserimento nel database"; //popup???
        }
        if ($tuple = pg_fetch_array($q_result, null, PGSQL_ASSOC)) {
            echo "Indirizzo mail già in utilizzo"; //popup di errore
        }
        else {
            $password = $_POST["password"];
            $nome = $_POST["name"];
            $cognome = $_POST["surname"];
            $query2 = "INSERT INTO utente (email, pswd, nome, cognome)
                VALUES ($1, $2, $3, $4)";
            $q_result = pg_query_params($dbconn, $query2, 
                array($email, $password, $nome, $cognome));
            if ($q_result) {
                echo "Registrazione completata"; //scheda utente nel menu (alto a sinistra), solo nome cognome e mail / tasto logout
                header("Location: index.php");
            }
        }
        pg_close($dbconn);       
    ?>
</body>
</html>