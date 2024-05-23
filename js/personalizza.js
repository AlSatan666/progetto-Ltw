document.addEventListener('DOMContentLoaded', function () {
    const boardStyleSelect = document.getElementById('boardStyle');
    const pieceStyleSelect = document.getElementById('pieceStyle');
    const saveSettingsButton = document.getElementById('saveSettings');
    let scacchieraPreview = Chessboard('scacchieraPreview', {
        position: 'start',
        pieceTheme: `img/chesspieces/wikipedia/{piece}.png`,
        draggable: true,
        dropOffBoard: 'snapback',
        sparePieces: false
    });

    function updateBoard() {
        const boardStyle = boardStyleSelect.value;
        const pieceStyle = pieceStyleSelect.value;

        const pieceThemePath = `img/chesspieces/${pieceStyle}/{piece}.png`;
        console.log("Stile della scacchiera:", boardStyle);
        console.log("Stile dei pezzi:", pieceStyle);
        console.log("Percorso tema dei pezzi:", pieceThemePath);

        // Aggiorna la configurazione della scacchiera
        scacchieraPreview = Chessboard('scacchieraPreview', {
            position: 'start',
            pieceTheme: pieceThemePath,
            draggable: true,
            dropOffBoard: 'snapback',
            sparePieces: false
        });

        document.getElementById('scacchieraPreview').style.backgroundImage = `url('img/board/${boardStyle}.jpg')`;
        document.getElementById('scacchieraPreview').style.backgroundSize = 'cover';

        console.log("Scacchiera aggiornata con successo.");
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
