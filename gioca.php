<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scacchiera.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/scacchiera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"> <!-- loghi per menu -->
    <link rel="icon" href="/icons/logo.png">
    <link rel="stylesheet"
      href="https://unpkg.com/@chrisoakman/chessboardjs@1.0.0/dist/chessboard-1.0.0.min.css"
      integrity="sha384-q94+BZtLrkL1/ohfjR8c6L+A6qzNH9R2hBLwyoAfu3i/WCvQjzL2RQJ3uNHDISdU"
      crossorigin="anonymous">
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Gioca</a></li>
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


    <div class="container-scacchiera">
        <div class="scacchiera" id="scacchieraGioca"></div>
            <div class="container-bottoni">
                <button id="startPosition"><i class='bx bx-chevrons-left' ></i></button>
                <button id="prePosition"><i class='bx bx-chevron-left' ></i></button>
                <button id="postPosition"><i class='bx bx-chevron-right' ></i></button>
                <button id="lastPosition"><i class='bx bx-chevrons-right'></i></button>
                <p class="interpreter">LoremIpsum</p>
                <div class="container-slider">
                    <label for="slideStockfish">Seleziona la difficoltà:</label><br />
                    <input class="slideStockfish" type="range" min="1" max="8" value="1" list="stockValues"><br>
                    <datalist id="stockValues">
                        <option value="1" label="1"></option>
                        <option value="2" label="2"></option>
                        <option value="3" label="3"></option>
                        <option value="4" label="4"></option>
                        <option value="5" label="5"></option>
                        <option value="6" label="6"></option>
                        <option value="7" label="7"></option>
                        <option value="8" label="8"></option>
                    </datalist>
                </div>
                <button id="nuovapartita">Nuova Partita</button>
            </div>
            
        </div>
    </div>
    

    <script src="js/modal.js"></script>
    <script src="js/nav.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@chrisoakman/chessboardjs@1.0.0/dist/chessboard-1.0.0.min.js"
            integrity="sha384-8Vi8VHwn3vjQ9eUHUxex3JSN/NFqUg3QbPyX8kWyb93+8AC/pPWTzj+nHtbC5bxD"
            crossorigin="anonymous"></script>
    <script src="js/gioca.js"></script>
</body>
</html>

