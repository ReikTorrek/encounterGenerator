$(document).ready(function () {
    $('.getGame').click(function (id) {
        let gameId = id.currentTarget.id;
        $.ajax({
            method: 'POST',
            url: "http://localhost/2022/encounterGenerator/PHP/setGameId.php",
            dataType: "json",
            data: {gameId : JSON.stringify(gameId)},
            error: function(er) {
                console.log(er);
            }
        })
        window.location.href = '/2022/encounterGenerator/pages/main.php'
    })
    $('.deleteGame').click(function (id) {
        let gameId = id.currentTarget.id;
        $.ajax({
            method: 'POST',
            url: "http://localhost/2022/encounterGenerator/PHP/deleteGame.php",
            dataType: "json",
            data: {gameId : JSON.stringify(gameId)},
            error: function(er) {
                console.log(er);
            }
        })
        window.location.href = '/2022/encounterGenerator/index.php'
    })
})