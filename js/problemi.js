var scacchiera = new Chessboard('scacchieraPuzzle');

var buttonNuovo = document.getElementById('nuovoPuzzle');
var buttonRisolvi = document.getElementById('risolviPuzzle');


buttonNuovo.addEventListener('click', function() {nuovoPuzzle();});
buttonRisolvi.addEventListener('click', function() {risolviPuzzle();});

function puzzleFromServewr() {
    console.log('Bottone nuovo cliccato');
    //parla con il server per ottenere un nuovo puzzle
    //memorizza dei dati

    setNuovaScacchiera(//dati ricevuti
    )
}

function risolviPuzzle() {
    console.log('Bottone risolvi cliccato');
    //esegue la mossa da fare automaticamente (non tutte, i puzzle di lichess prevedono più mosse)
}


function setNuovaScacchiera(//dati ricevuti
) {
    //inizia un partita con new Chess, al quale passiamo il secondo campo del csv
    //configurazione con onMouseenter (gestisce i suggerimenti) e onMousedown (gestisce il click)
    //new Chessboard(id, configurazione)
    //trova la prossima mossa da fare, con il terzo campo del csv
}


//gestire la convalidazione della mossa fatta e l'esecuzione (verificaMossa ed eseguiMossa)