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
    <link rel="stylesheet" href="css/scacchiera.css">
    <link rel="stylesheet" href="css/personalizza.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="icon" href="/icons/logo.png">
    <title>Personalizza</title>
</head>
<body>
    <nav>
        <div class="navbar">
            <i class="bx bx-menu sidebarOpen"></i>
            <span class="logo navLogo">
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
                <i class="bx bx-moon moon"></i>
                <i class="bx bx-sun sun"></i>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Personalizza la tua scacchiera</h1>
        <div class="options">
            <div class="option">
                <label for="boardStyle">Seleziona lo stile della scacchiera:</label>
                <select id="boardStyle">
                    <option value="default">Default</option>
                    <option value="wood">Wood</option>
                    <option value="blue-marble">Blue Marble</option>
                </select>
            </div>
            <div class="option">
                <label for="pieceStyle">Seleziona lo stile dei pezzi:</label>
                <select id="pieceStyle">
                    <option value="wikipedia">Default</option>
                    <option value="classic">Classic</option>
                    <option value="fancy">Fancy</option>
                </select>
            </div>
        </div>
        <div class="preview">
            <div id="scacchiera" class="scacchiera"></div>
        </div>
        <button id="saveSettings">Salva Impostazioni</button>
    </div>

    <script src="js/nav.js"></script>
    <script src="js/modal.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const boardStyleSelect = document.getElementById('boardStyle');
            const pieceStyleSelect = document.getElementById('pieceStyle');
            const saveSettingsButton = document.getElementById('saveSettings');
            const scacchiera = document.getElementById('scacchiera');

            const initialPosition = [
                ['bR', 'bN', 'bB', 'bQ', 'bK', 'bB', 'bN', 'bR'],
                ['bP', 'bP', 'bP', 'bP', 'bP', 'bP', 'bP', 'bP'],
                ['', '', '', '', '', '', '', ''],
                ['', '', '', '', '', '', '', ''],
                ['', '', '', '', '', '', '', ''],
                ['', '', '', '', '', '', '', ''],
                ['wP', 'wP', 'wP', 'wP', 'wP', 'wP', 'wP', 'wP'],
                ['wR', 'wN', 'wB', 'wQ', 'wK', 'wB', 'wN', 'wR']
            ];

            const pieceImages = {
                'wK': 'wK.png',
                'wQ': 'wQ.png',
                'wR': 'wR.png',
                'wB': 'wB.png',
                'wN': 'wN.png',
                'wP': 'wP.png',
                'bK': 'bK.png',
                'bQ': 'bQ.png',
                'bR': 'bR.png',
                'bB': 'bB.png',
                'bN': 'bN.png',
                'bP': 'bP.png'
            };

            function createBoard(position, pieceStyle) {
                scacchiera.innerHTML = '';
                for (let row = 0; row < 8; row++) {
                    for (let col = 0; col < 8; col++) {
                        const square = document.createElement('div');
                        square.classList.add('square');
                        square.classList.add((row + col) % 2 === 0 ? 'white' : 'black');

                        const piece = position[row][col];
                        if (piece) {
                            const pieceImg = document.createElement('img');
                            pieceImg.src = `img/chesspieces/${pieceStyle}/${pieceImages[piece]}`;
                            pieceImg.classList.add('piece');
                            square.appendChild(pieceImg);
                        }

                        scacchiera.appendChild(square);
                    }
                }
            }

            function updateBoard() {
                const boardStyle = boardStyleSelect.value;
                const pieceStyle = pieceStyleSelect.value;

                scacchiera.style.backgroundImage = `url('img/board/${boardStyle}.jpg')`;
                scacchiera.style.backgroundSize = 'cover';
                createBoard(initialPosition, pieceStyle);
            }

            boardStyleSelect.addEventListener('change', updateBoard);
            pieceStyleSelect.addEventListener('change', updateBoard);

            saveSettingsButton.addEventListener('click', function () {
                localStorage.setItem('boardStyle', boardStyleSelect.value);
                localStorage.setItem('pieceStyle', pieceStyleSelect.value);
                alert('Impostazioni salvate!');
            });

            const savedBoardStyle = localStorage.getItem('boardStyle');
            const savedPieceStyle = localStorage.getItem('pieceStyle');
            if (savedBoardStyle) {
                boardStyleSelect.value = savedBoardStyle;
            }
            if (savedPieceStyle) {
                pieceStyleSelect.value = savedPieceStyle;
            }

            updateBoard();
        });
    </script>
</body>
</html>
