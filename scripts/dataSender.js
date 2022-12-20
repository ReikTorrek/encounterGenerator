$(document).ready(function () {
    $('#sendCreatureData').click(function () {
        let mods = $('#stats').children('input')
        let statsLength = mods.length;
        let stats = new Map();
        for (let i = 0; i < statsLength; i ++) {
            stats.set(mods[i].id, mods[i].value);
        }

        let data = {
            'name' : $('input#name').val(),
            'race' : $('input#race').val().toLowerCase(),
            'type' : $('input#type').val().toLowerCase(),
            'class' : $('input#class').val().toLowerCase(),
            'lvl' : $('input#lvl').val(),
            'aligment' : $('input#aligment').val().toLowerCase(),
            'HP' : $('input#HP').val(),
            'AC' : $('input#AC').val(),
            'armor' : $('input#armor').val(),
            'actions' : $('input#actions').val(),
            'defenceActions' : $('input#defenceActions').val(),
            'ability' : $('select#ability').val(),
            'buff' : $('select#buff').val(),
            'debuff' : $('select#debuff').val(),
            'stats' : JSON.stringify(Object.fromEntries(stats)),
    }
        console.log(JSON.stringify(data));
        $.ajax({
            method: 'POST',
            url: "http://localhost/2022/encounterGenerator/PHP/addCreature.php",
            dataType: "json",
            data: {addCreature : JSON.stringify(data)},
            success: function(data) {
                console.log(data);
            },
            error: function(er) {
                console.log(er);
            }
        })
    })
})