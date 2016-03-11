
 $(document).ready(function(){ 
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
       
   // $("#valid").dialog({
   //      autoOpen: false,
   //      width: 400,
   //      hide: "fold",
   //      show: "shake",
   //      open: function (event, ui) {
   //          setTimeout(function () {
   //              $("#valid").dialog('close');
   //          }, 3000);
   //      }
   //  }).dialog("open");


   //       $("#error").dialog({
   //      autoOpen: false,
   //      width: 400,
   //      hide: "puff",
   //      show: "fade",
   //      open: function (event, ui) {
   //          setTimeout(function () {
   //              $("#error").dialog('close');
   //          }, 3000);
   //      }
   //  }).dialog("open");

$('#scrollbox').slimScroll({
    // width: '300px',
    height: '470px',
    // size: '10px',
    // position: 'right',
    // color: '#ffcc00',
    // alwaysVisible: false,
    // distance: '20px',
    // start: bottom,
    // railVisible: true,
    // railColor: '#222',
    // railOpacity: 0.3,
    // wheelStep: 10,
    allowPageScroll: false,
    // disableFadeOut: false
});

});

