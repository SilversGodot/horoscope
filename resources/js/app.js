require('./bootstrap');

$(function(){
    var currentHoroscope = $("#currentHoroscope").val();

    if (!currentHoroscope) {
        $("#" + currentHoroscope + "_Sign").attr("style", "opacity: 1; filter: grayscale(0);");
        $("#" + currentHoroscope + "_Row").addClass("table-secondary");
    }
});