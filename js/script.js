$(document).ready(function(){
    $(".dropdown-button").dropdown();
    $(".thread-col").click(function() {
        window.document.location = $(this).data("href");
        console.log('click');
    });
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 1000, // Creates a dropdown of 15 years to control year
    min: new Date(1900,1,1),
    max: new Date()
  });
});