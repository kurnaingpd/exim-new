// $(window).load(function() {
//     alert("window is loaded");
// });

$( window ).on("load", function() {
        // Handler for .load() called.
        // alert("window is loaded");
        $(".preloader").delay(1000).fadeOut("slow");
});
