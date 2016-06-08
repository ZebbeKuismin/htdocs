$(document).ready(function(){
    $(".dropdown-button").dropdown();
    $(".thread-col").click(function() {
        window.document.location = $(this).data("href");
        console.log('click');
    });
});