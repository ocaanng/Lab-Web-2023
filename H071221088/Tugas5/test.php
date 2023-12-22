
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlackJack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="game.css">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="text-center" id="home">
            <h1 style="color: white;">Welcome To My BlackJack<image src="logo.png" width="10%"></image></h1>
            <button type="button" class="btn btn-success" id="menu-button">Play Game</button>
        </div>
        <div class="text-center" id="menu" style="display: none;">
            <h3 style="color: white;">Jumlah Uang</h3>
            <div class="input-group mb-3">
                <span class="input-group-text">Rp.</span>
                <input type="text" id="money-input" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
            </div>
            <h3 style="color: white;">Taruhan</h3>
            <div class="input-group mb-3">
                <span class="input-group-text">Rp.</span>
                <input type="text" id="bet-input" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
            </div>
            <button type="button" class="btn btn-outline-success" id="play-button" style="margin-top: 10px;">Play</button>
        </div>
        <div id="container" style="display: none;">
            <div id="game-container" style="display: block;"></div>
            <h2 style="color: white;">Dealer: <span id="dealer-sum" style="display: block; color: white;"></span>
                <div id="dealer-cards" style="display: block;">
                    <img id="hidden" src="./cards/BACK.png" style="width: 10%;">
                </div>
            </h2>
            <h2 style="color: white;">Player: <span id="player-sum" style="display: block; color: white;"></span></h2>
            <div id="player-cards" style="display: block;"></div>
            <br>
            <div id="money-display" style="color: white;">Jumlah Uang: Rp.<span id="money-amount">0</span></div> <br>
            <div id="bet-display" style="color: white;">Taruhan: Rp.<span id="bet-amount">0</span></div> <br>
            <button type="button" class="btn btn-success" id="hit">Hit</button>
            <button type="button" class="btn btn-success" id="stay">Stand</button>
            <button type="button" class="btn btn-success" id="Again" style="display: none; margin-top: 2px;">Play Again</button>
            <br>
            <p id="results"></p>
        </div>
    </div>
  </body>
</html>

<script>
let dealerSum = 0;
let player1Sum = 0;
let dealerAceCount = 0;
let player1AceCount = 0;
let hidden;
let deck;
let canHit = true;
let money = 0;
let bet = 0;
let canStay = true;

document.getElementById("menu-button").addEventListener("click", function () {
    document.getElementById("home").style.display = "none";
    document.getElementById("menu").style.display = "block";
});


document.getElementById("play-button").addEventListener("click", function () {
    let moneyInput = document.getElementById("money-input");
    money = parseFloat(moneyInput.value);
    let betInput = document.getElementById("bet-input");
    bet = parseFloat(betInput.value);
    if (bet > money) {
        alert("Taruhan tidak dapat melebihi jumlah uang yang Anda miliki.");
        return;
    }
    document.getElementById("menu").style.display = "none";
    document.getElementById("container").style.display = "block";
    buildDeck();
    shuffleDeck();
    startGame();
});

// document.getElementById("Again").addEventListener("click", function () {
//     dealerSum = 0;
//     player1Sum = 0;
//     dealerAceCount = 0;
//     player1AceCount = 0;
//     hidden = null;
//     deck = [];
//     canHit = true;
//     canStay = true;
//     document.getElementById("container").style.display = "block";
//     document.getElementById("Again").style.display = "none";
//     document.getElementById("dealer-cards").innerHTML = '';
//     document.getElementById("player-cards").innerHTML = '';
//     document.getElementById("dealer-sum").innerText = '';
//     document.getElementById("player-sum").innerText = '';
//     document.getElementById("results").innerText = '';
//     buildDeck();
//     shuffleDeck();
//     startGame();
// });

function restartGame() {
    dealerSum = 0;
    player1Sum = 0;
    dealerAceCount = 0;
    player1AceCount = 0;
    hidden = null;
    deck = [];
    canHit = true;
    canStay = true;
    document.getElementById("dealer-sum").innerText = '';
    document.getElementById("player-sum").innerText = '';
    document.getElementById("dealer-cards").innerHTML = '';
    document.getElementById("player-cards").innerHTML = '';
    document.getElementById("menu").style.display = "none";
    document.getElementById("container").style.display = "block";
    buildDeck();
    shuffleDeck();
    startGame();
}

document.getElementById("Again").addEventListener("click", restartGame);

function buildDeck(){
    let rank = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    let suit = ["C", "D", "H", "S"];
    deck = [];

    for (let i = 0; i < suit.length; i++){
        for (let j = 0; j < rank.length; j++){
            deck.push(rank[j] + "-" + suit[i]);
        }
    }
    console.log(deck);
}

function shuffleDeck(){
    for (let i = 0; i < deck.length; i++) {
        let j = Math.floor(Math.random() * deck.length);
        let temp = deck[i];
        deck[i] = deck[j];
        deck[j] = temp;
    }
}

function startGame(){
    hidden = deck.pop();
    dealerSum += getValue(hidden);
    dealerAceCount += checkAce(hidden);
    balance = money - bet;
    document.getElementById("money-amount").textContent = balance;
    document.getElementById("bet-amount").textContent = bet;
    
    while (dealerSum < 17) { 
            let cardImg = document.createElement("img");
            let card = deck.pop();
            cardImg.src = "./cards/" + card + ".png";
            cardImg.style.width = "10%";
            dealerSum += getValue(card);
            dealerAceCount += checkAce(card);
            document.getElementById("dealer-cards").append(cardImg);
    }
    console.log(dealerSum);


     for (let i = 0; i < 2; i++) {
            let cardImg = document.createElement("img");
            let card = deck.pop();
            cardImg.src = "./cards/" + card + ".png";
            cardImg.style.width = "10%";
            player1Sum += getValue(card);
            player1AceCount += checkAce(card);
            document.getElementById("player-cards").append(cardImg);

}
    console.log(player1Sum);
    document.getElementById("hit").addEventListener("click", hit);
    document.getElementById("stay").addEventListener("click", stay);
    document.getElementById("player-sum").innerText = player1Sum;
}

function hit() {
    if (!canHit) {
        return;
    }
    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    cardImg.style.width = "10%";
    player1Sum += getValue(card);
    player1AceCount += checkAce(card);
    document.getElementById("player-cards").append(cardImg);

    if(reduceAce(player1Sum, player1AceCount) > 21) {
            canHit = false;
    }
}

function stay() {
    dealerSum = reduceAce(dealerSum, dealerAceCount);
    player1Sum = reduceAce(player1Sum, player1AceCount);
    
    canHit = false;
    document.getElementById("hidden").src = "./cards/" + hidden + ".png";
    let message = "";
    if (player1Sum > 21) {
        money = balance;
        if (balance == 0) {
            message = "Game Over!";
            alert(message);
            document.getElementById("container").style.display = "none";
            document.getElementById("home").style.display = "block";
        } else {
        message = "You Lose";
        }
    }
    else if (dealerSum > 21) {
        message = "You win!";
        money = balance + bet + bet;
        document.getElementById("container").style.display = "block";
        document.getElementById("money-amount").textContent = money;
    }
    else if (player1Sum == dealerSum) {
        message = "Draw!";
        document.getElementById("container").style.display = "block";
    }
    else if (player1Sum > dealerSum) {
        message = "You win!";
        money = balance + bet + bet;
        document.getElementById("container").style.display = "block";
        document.getElementById("money-amount").textContent = money;
    }
    else if (player1Sum < dealerSum) {
        money = balance;
        if (balance == 0) {
            message = "Game Over!";
            alert(message);
            document.getElementById("container").style.display = "none";
            document.getElementById("home").style.display = "block";
        } else {
        message = "You Lose";
        }
    }
    document.getElementById("dealer-sum").innerText = dealerSum;
    document.getElementById("player-sum").innerText = player1Sum;
    document.getElementById("results").innerText = message;
    document.getElementById("Again").style.display = "block";
}

function getValue(card){
    let data = card.split("-");
    let value = data[0];
    
    if (isNaN(value)) {
        if (value == "A") {
            return 11;
        }
        return 10;
    }
    return parseInt(value);
}

function checkAce(card) {
    if(card[0] == "A" ) {
        return 1; 
    }
    return 0;
}

function reduceAce(playerSum, playerAceCount) {
    while (playerSum > 21 && playerAceCount > 0) {
        playerSum -= 10;
        playerAceCount -= 1;
    }
    return playerSum;
}
</script>

masukkan style cardImg ke css