<script>
    var bumpIt = function() {
      $('body').css('margin-bottom', $('.page-footer').height()+70);
  },
  didResize = false;

  bumpIt();

  $(window).resize(function() {
      didResize = true;
  });
  setInterval(function() {
      if(didResize) {
        didResize = false;
        bumpIt();
    }
}, 250);

</script>

<script>
var lang = Cookies.get('langCookie');
var currr = $("#"+lang);
console.log(currr);
currr.attr("selected",'');
</script>