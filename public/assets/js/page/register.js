/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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