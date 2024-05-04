// Array di configurazioni della scacchiera per ogni livello
const levels = [
    {
        fen: 'start', // Posizione iniziale
        allowedMoves: ['e4', 'e5', 'd4', 'd5'], // Mosse consentite per questo livello
        nextLevelFen: 'r1bqkbnr/pppp1ppp/2n5/4p3/2P5/8/PP1PPP1P/RNBQKBNR w KQkq - 0 3' // Posizione della prossima configurazione della scacchiera
    },
    // Aggiungi altri livelli come necessario
];

// Variabili per tenere traccia dello stato del tutorial
let currentLevel = 0;

// Inizializza la scacchiera
const board = Chessboard('board', {
    draggable: true,
    position: levels[currentLevel].fen,
    onDrop: (source, target, piece, newPos, oldPos, orientation) => {
        // Verifica se la mossa è consentita per questo livello
        const move = source + target;
        if (levels[currentLevel].allowedMoves.includes(move)) {
            // Aggiorna la posizione della scacchiera
            board.position(newPos);

            // Controlla se è il momento di passare al prossimo livello
            if (newPos === levels[currentLevel].nextLevelFen) {
                currentLevel++;
                if (currentLevel < levels.length) {
                    // Nascondi il pulsante di avanzamento al prossimo livello se non ci sono più livelli
                    document.getElementById('nextLevelBtn').style.display = 'block';
                }
            }
        } else {
            // Annulla la mossa se non è consentita per questo livello
            return 'snapback';
        }
    }
});

// Gestisci il pulsante per avanzare al prossimo livello
document.getElementById('nextLevelBtn').addEventListener('click', () => {
    if (currentLevel < levels.length - 1) {
        currentLevel++;
        // Aggiorna la posizione della scacchiera al prossimo livello
        board.position(levels[currentLevel].fen);
        // Nascondi il pulsante di avanzamento al prossimo livello se non ci sono più livelli
        if (currentLevel === levels.length - 1) {
            document.getElementById('nextLevelBtn').style.display = 'none';
        }
    }
});
