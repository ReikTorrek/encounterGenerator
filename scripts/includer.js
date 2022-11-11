$(document).ready(function () {
    jQuery.ajax({
        url: "http://localhost/2022/encounterGenerator/assets/templates/menu.php",
        dataType: "html",
        success: function(response) {
            document.getElementById('navBar').innerHTML = response;
        }
    });
})