<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controlla se l'email e la password sono state inviate
    if(isset($_POST['email']) && isset($_POST['password'])) {
        // Connessione al database PostgreSQL
        $connection = pg_connect("host=localhost dbname=WebsiteLogindb user=postgres port=5432 password=password");

        if (!$connection) {
            echo "Impossibile connettersi al database.<br>";
            exit;
        }
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Esegue la query per verificare le credenziali dell'utente
        $query = "SELECT * FROM utente WHERE email = '$email' AND password = '$password'";
        $result = pg_query($connection, $query);

        if ($result && pg_num_rows($result) > 0) {
            // Credenziali corrette, crea una sessione per l'utente
            $_SESSION['email'] = $email;
            echo "Accesso riuscito. Benvenuto!";
        } else {
            // Credenziali errate, mostra un messaggio di errore
            echo "<script>alert('Email o password errati. Riprova.');</script>";
        }

        // Chiudi la connessione al database
        pg_close($connection);
    } else {
        // Se email o password non sono state inviate, mostra un messaggio di errore
        echo "Errore: Email e password sono richieste.";
    }
}
?>
