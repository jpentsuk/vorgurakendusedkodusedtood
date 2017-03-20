/**
 * Created by jpent on 20.03.2017.
 */
$(document).ready(function () {
    $("li").first().addClass("active");

    $("#next").click(function () {
        var edasiseis = $("li.active");

        if (edasiseis.is("li:last-child"))
        {
            console.log("tere");
            edasiseis.removeClass("active");
            $("li").first().addClass("active");
        }
        else
        {
            edasiseis.removeClass("active");
            edasiseis.next().addClass("active");
        }
    });
    $("#prev").click(function ()
    {
        var tagasiseis = $("li.active");
        if (tagasiseis.is("li:first-child"))
        {
            tagasiseis.removeClass("active");
            $("li").last().addClass("active");
        }
        else
        {
            tagasiseis.removeClass("active");
            tagasiseis.prev().addClass("active");
        }

    });







});