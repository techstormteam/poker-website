/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function notification(title, content) {
    $.gritter.removeAll({
        after_close: function() {
            $.gritter.add({
                position: 'top-right',
                title: title,
                text: content,
                class_name: 'clean',
                time: 1500
            });
        }
    });
    return false;
}

$('.slider').slider();
$('#tables_slider').slider().on('slide', function(e){
    $("#tables").html(e.value);
});
$('#seats_slider').slider().on('slide', function(e){
    $("#seats").html(e.value);
});
$('#start_code_slider').slider().on('slide', function(e){
    $("#start_code").html(e.value);
});
$('#start_min_slider').slider().on('slide', function(e){
    $("#start_min").html(e.value);
});
$('#min_players_slider').slider().on('slide', function(e){
    $("#min_players").html(e.value);
});
$('#recur_minutes_slider').slider().on('slide', function(e){
    $("#recur_minutes").html(e.value);
});




$('#chips_slider').slider().on('slide', function(e){
    $("#chips").html(e.value);
});
$('#turn_clock_slider').slider().on('slide', function(e){
    $("#turn_clock").html(e.value);
});
$('#time_bank_slider').slider().on('slide', function(e){
    $("#time_bank").html(e.value);
});
$('#level_slider').slider().on('slide', function(e){
    $("#level").html(e.value);
});
$('#rebuy_levels_slider').slider().on('slide', function(e){
    $("#rebuy_levels").html(e.value);
});
$('#break_time_slider').slider().on('slide', function(e){
    $("#break_time").html(e.value);
});
$('#break_levels_slider').slider().on('slide', function(e){
    $("#break_levels").html(e.value);
});
$(".btn-group .btn").click(function() {
    $(".btn-group .btn").removeClass("active");
    $(".btn-group .btn input").removeAttr("checked");
    $(this).addClass("active");
    $(this).find("input").prop('checked', true);
}); 
$("#credit_slider").slider().on("slide", function(e) {
    $("#credits").html("$" + e.value);
});
$("#rate_slider").slider().on("slide", function(e) {
    $("#rate").html(e.value + "%");
});

$(document).ready(function() {
    //initialize the javascript
    App.init();
    App.wizard();
});