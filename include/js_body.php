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

  function notify(salon) {
    document.getElementById("salonSel").innerHTML = salon;
    document.getElementById("salonSel-hidden").value = salon;
    document.getElementById("lang").value = Cookies.get('langCookie');
    document.getElementById('progress').style.display = "block";
    document.getElementById("progress").style.visibility = "hidden";
    document.getElementById("done").style.display = "none";
    $('select').material_select();
    $('#notify-modal').openModal();
  }

  function submitnotify(theForm) {
    var myData = $('#notifyform').serializeArray();
    $.ajax({
        url: 'scripts/agregar.php',
        type: 'POST',
        data: $.param(myData),
        success: function(msg) {
            document.getElementById('progress').style.visibility = "visible"
            setTimeout(function() {
                document.getElementById('progress').style.display = "none";
                document.getElementById('done').style.display = "block";
            }, 1500);
            setTimeout(function() {
                $('#notify-modal').closeModal();
            }, 3000);

        }
    });
  }
</script>