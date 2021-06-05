require('./bootstrap');

$(function(){
    // loading horoscope list
    $.getJSON("/horoscope/list", function(data) {
		//iterate json response
        $.each(data, function(key, val) {         
            var newRowContent = "<tr id='" + val.name + "_Row'>" + 
                "<th scope='row'>" + val.name + "</th>" +
                "<td>" + val.start_date + "</td>" + 
                "<td>" + val.end_date + "</td></tr>";
            $("#horoscopeTable tbody").append(newRowContent);
        });
    });

    // handle form submit event with Ajax call
    $("#myform").on("submit", function(event){
        event.preventDefault();

        // Reset query result
        var currentHoroscope = $("#currentHoroscope").val();
        if (currentHoroscope) {
            var currentSign = $("#" + currentHoroscope + "_Sign");
            if (currentSign.length > 0) {
                currentSign.attr("style", "filter: grayscale(100%); opacity: .5;");
            }
    
            var currentRow = $("#" + currentHoroscope + "_Row");
            if (currentSign.length > 0) {
                currentRow.removeClass("table-secondary");
            }            
        }

        // Query web service for horoscope
        var url = "/horoscope/result?input_date=" + $("datepicker").val();
        $.getJSON(url, function(data) {
            var updateHoroscope = data.Horoscope;
            $("#" + updateHoroscope + "_Sign").attr("style", "opacity: 1; filter: grayscale(0);");
            $("#" + updateHoroscope + "_Row").addClass("table-secondary");
            $("#currentHoroscope").val(updateHoroscope);
        });
    });
});