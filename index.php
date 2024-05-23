<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"> <!-- loghi per menu -->
    <link rel="icon" href="/icons/logo.png">
    <title>Scacco Matto</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <i class="bx bx-menu sidebarOpen"></i>
            <span class="logo navLogo">
                <!--<img src="/icons/logo.png" alt="logo">  LOGO SITO? -->
                <img src="icons/logo.png" alt="logo"> 
                <a href="index.php">ScaccoMatto</a>
            </span>
        
            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo">
                        <img src="icons/logo.png" alt="logo"> 
                        <a href="#">ScaccoMatto</a></span>
                    <i class="bx bx-x sidebarClose"></i>
                </div>

                <ul class="menu-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="gioca.php">Gioca</a></li>
                    <li><a href="puzzle.php">Puzzle</a></li>
                    <?php if (isset($_SESSION['email'])): ?>
                    <li><a href="personalizza.php">Personalizza</a></li>
                    <?php else: ?>
                    <li><a class="disabled">Personalizza</a></li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['email'])): ?>
                    <li class="profile-dropdown">
                        <div class="profile-dropdown-btn">
                            <div class="profile-img">
                                <i class="fa-solid fa-circle"></i>
                            </div>
                            <span><?php echo htmlspecialchars($_SESSION['user_name']); ?><i class="fa-solid fa-caret-down"></i>
                                
                            </span>
                        </div>

                        <ul class="profile-dropdown-list">
                            <li class="profile-dropdown-list-item">
                                <a href="#">
                                    <i class="fa-regular fa-user"></i>
                                    Modifica Profilo
                                </a>
                            </li>

                            <li class="profile-dropdown-list-item">
                                <a href="#">
                                    <i class="fa-regular fa-star"></i>
                                    Punteggio
                                </a>
                            </li>

                            <li class="profile-dropdown-list-item">
                                <a href="logout.php">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    Log out
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li><a href="#" id="loginBtn"><i class='fa fa-sign-in-alt'></i>Login</a></li>
                    <?php endif; ?>
                </ul>
            </div> 

            <div class="dark-light">
                <i class="bx bx-moon moon"></i> <!-- entrambi importati da boxicons-->
                <i class="bx bx-sun sun"></i>
            </div>
        </div>
    </nav>

    <div class="modal" id="loginModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="post" action="./login.php">
                <h2>Login</h2>
                <div class="form-element">
                    <label for="emailInput">Email:</label><br>
                    <input type="email" id="emailInput" name="email"  placeholder="Inserisci l'email" required autofocus><br>
                </div>
                <div class="form-element">
                    <label for="passwordInput">Password:</label><br>
                    <input type="password" id="passwordInput" name="password" placeholder="Inserisci la password" required><br>
                </div>
                <div class="register-form">
                    Non sei ancora registrato?
                    <a href="#" id="register-link">Registrati qui!</a>
                </div>
                <div class="form-element">
                    <button type="submit">Accedi</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="registerModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="POST" action="register.php">
                <h2>Registrazione</h2>
                <div class="form-element">
                    <label for="nameInput">Nome:</label><br>
                    <input type="text" id="nameInput" name="name"  placeholder="Inserisci il tuo nome" required autofocus><br>
                </div>
                <div class="form-element">
                    <label for="surnameInput">Cognome:</label><br>
                    <input type="text" id="surnameInput" name="surname"  placeholder="Inserisci il tuo cognome" required autofocus><br>
                </div>
                <div class="form-element">
                    <label for="emailInput">Email:</label><br>
                    <input type="email" id="emailInput" name="email"  placeholder="Inserisci l'email" required autofocus><br>
                </div>
                <div class="form-element">
                    <label for="passwordInput">Password:</label><br>
                    <input type="password" id="passwordInput" name="password" placeholder="Inserisci la password" required><br>
                </div>
                <div class="form-element">
                    <input type="checkbox"  id="remember-me" name="remember-me">
                    <label for="remember-me"> Ricordami </label>
                </div>
                <div class="login-form">
                    Sei già registrato?
                    <a href="#" id="login-link">Loggati qui!</a>
                </div>
                <div class="form-element">
                    <button type="submit">Registrati</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card-menu">
        <div class="card">
            <img src="icons/crd1.png" alt="Card1">
            <div class="card-container">
              <a href="gioca.php"><h2><b>Gioca con il computer</b></h2> </a>
              <p>La modalità "Sfida il Computer" è perfetta per chiunque desideri 
                mettere alla prova le proprie abilità di scacchi contro un avversario 
                che non dorme mai.</p> 
            </div>
        </div>
        <div class="card">
            <img src="icons/crd2.png" alt="Card2">
            <div class="card-container">
              <a href="puzzle.php"><h2><b>Puzzle</b></h2></a>
              <p>La modalità "Puzzle" è dove gli appassionati di scacchi possono migliorare 
                le loro abilità tattiche, affrontando una serie di problemi di scacchi.</p> 
            </div>
        </div>
        <div class="card">
            <img src="icons/crd3.png" alt="Card3">
            <div class="card-container <?php echo isset($_SESSION['email']) ? '' : 'disabled'; ?>">
              <a href="personalizza.php"><h2><b>Personalizza</b></h2></a>
              <p>La sezione "Personalizza" ti offre il controllo completo sull'aspetto della tua 
                esperienza di gioco. Disponibile solo agli utenti registrati, fallo subito!</p>
            </div>
        </div>
    </div>

    <script src="js/nav.js"></script>
    <script src="js/modal.js"></script>
    
</body>
</html>
