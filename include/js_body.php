<script>
  var bumpIt = function() {
      $('body').css('margin-bottom', $('.page-footer').height() + 70);
    },didResize = false;
  bumpIt();

  $(window).resize(function() {
    didResize = true;
  });
  setInterval(function() {
    if (didResize) {
      didResize = false;
      bumpIt();
    }
  }, 250);


  var lang = Cookies.get('langCookie');
  var currr = $("#" + lang);
  currr.attr("selected", '');

</script>