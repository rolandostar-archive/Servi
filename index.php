<!DOCTYPE HTML>
<html>
<head>

    <?php include_once ( 'include/meta.php'); include_once ( 'include/js_head.php'); ?>
    <title>Servi&trade; [Classroom] &raquo;</title>

</head>

<body>
<div id="wrapper">
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <div class="row center">
                <img src="assets/img/Logo.png" class="hide-on-small-only responsive-img" style="max-height:195px;" height=100%/>
                <img src="assets/img/Logo-m.png" class="hide-on-med-and-up responsive-img"/>
            </div>
            <div class="row center">
                <h5 class="header col s12 light white-text" lang="es">Un Moderno Localizador de Salones Disponibles para tu Instituci&oacute;n</h5>
            </div>
        </div>
    </div>
    <main>
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col s12 m12 l4 offset-l1" id="servi_flex">
                        <div class="card">
                            <div id="scroll" class="card-content black-text" style="min-width:182px; overflow: hidden;">
                                <!-- Se muestra solo en Cel -->
                                <span class="card-title hide-on-med-and-up grey-text text-darken-4" style="line-height:2.5em">
                                    <a href="#modal1" class="modal-trigger" ><span class="black-text" lang="es">Disponibles Ahora</span><i class="material-icons medium right">fullscreen</i></a>
                                </span>
                                <!-- Se muestra en todos menos en Cel -->
                                <span class="card-title hide-on-small-only" lang="es">Disponibles Ahora</span>
                                <table class="responsive-table bordered centered hide-on-small-only" name="servi">
                                <?php include('scripts/servi.php') ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card ">
                            <div class="card-content blck-text" id="Proximos">
                                <span class="card-title" lang="es">Pr&oacute;ximos</span class="card-title"><span lang="es">(Dentro de 1:30hr)</span>
                                <!-- Se muestra en todos menos en Cel -->
                                <table class="bordered centered hide-on-small-only">
                                <?php $mobile=0; include('scripts/prox.php'); ?>
                                </table>
                                <!-- Se muestra solo en Cel -->
                                <table class="bordered centered hide-on-med-and-up">
                                <?php $mobile=1; include('scripts/prox.php'); ?>
                                </table>
                            </div>
                            
                            <div class="card-reveal2" style="font-size:20px;" id="Notify">
                                <span class="card-title grey-text text-darken-4" lang="es">Servicio de Notificaciones<i class="material-icons right">close</i></span>
                                <p class="flow-text2" lang="es">Dejanos tu correo y te enviaremos una notificación cuando el salón este <a lang="es">disponible</a></p>.
                                <form id="notifyform" class="col s12" action="javascript:submitnotify(0);">
                                    <div class="row">
                                        <div class="input-field col s9 m6 l9 offset-m2">
                                            <i class="material-icons prefix" style="margin-top:6px;">account_circle</i>
                                            <input id="email" name="email" type="email" value="" class="validate" required>
                                             <label for="email">Email</label>
                                        </div>
                                        <input id="salonSel-hidden" type="hidden" name="Salon" value="">
                                        <input id="lang" type="hidden" name="lang" value="">
                                        <div class="input-field col s3 m2 l3 ">
                                            <select name="salon" disabled>
                                                <option id="salonSel" selected></option>
                                            </select>
                                            <label>Salon</label>
                                        </div>
                                    </div>
                                    <div class="row center">
                                        <button class="btn waves-effect waves-light" id="submit" lang="es">Enviar
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                    <div id="progress" class="progress">
                                        <div class="indeterminate"></div>
                                    </div>
                                    <div class="row center">
                                        <i class="material-icons" id="done">done</i>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card" id="report-card">
                            <div class="card-content blck-text">
                                <span class="card-title activator grey-text text-darken-4" lang="es">Reportes<i class="material-icons right">info_outline</i></span>
                                <table class=" bordered centered">
                                    <thead>
                                        <tr>
                                            <th><strong lang="es">D&iacute;a</strong></th>
                                            <th><strong lang="es">Sal&oacute;n</strong></th>
                                            <th><strong lang="es">Horario</strong></th>
                                            <th><strong lang="es">Estado</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody class="mono">
                                        <tr>
                                            <td>12/23/15</td>
                                            <td>1312</td>
                                            <td>11:00 - 12:30</td>
                                            <td lang="es">Ocupado</td>
                                        </tr>
                                        <tr>
                                            <td>12/23/15</td>
                                            <td>1313</td>
                                            <td>11:00 - 12:30</td>
                                            <td lang="es">Disponible</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-reveal" style="font-size:20px;">
                                <span class="card-title grey-text text-darken-4" lang="es">Informacion!<i class="material-icons right">close</i></span>
                                <p lang="es">Los espacios que se muestran en esta secci&oacute;n son reportados por usuarios, Servi&trade; [Classrooms] no es responsable de su contenido.</p>
                                <p lang="es">Para Realizar una aportaci&oacute;n solo da click en el enlace "Enviar un Reporte".</p>
                            </div>
                            <div class="card-action">
                                <a href="#"><span class="cyan-text right" lang="es">Enviar un Reporte</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </main>

    <footer class="page-footer blue-grey darken-2 z-depth-3">
        <div class="container">
            <div class="row">
                <div class="col l6 m6 s12">
                    <h5 class="white-text" lang="es">¿Quienes Somos?</h5>
                    <p class="grey-text text-lighten-4" lang="es">Somos un equipo de estudiantes que trabajan en este proyecto por motivos educativos/acad&eacute;micos. Si tienes alguna idea para mejorar el proyecto o encuentras un error <a href="mailto:admin@sindral.net?Subject=Servi%u2122%20%5BClassrooms%5D" class="cyan-text"><span lang="es">Cont&aacute;ctanos!</span></a>
                    </p>
                </div>
                <div class="col l3 m3 s12 offset-m3 offset-l3">
                    <h5 class="white-text" lang="es">Enlaces</h5>
                    <ul>
                        <li><a href="mailto:admin@sindral.net?Subject=Servi%u2122%20%5BClassrooms%5D" class="cyan-text"><span lang="es">Contacto</span></a>
                        </li>
                        <li><a class="cyan-text" href="legal/?privacy"><span lang="es">Pol&iacute;tica de Privacidad</span></a>
                        </li>
                        <li><a class="cyan-text" href="legal/?terms"><span lang="es">T&eacute;rminos y Condiciones</span></a>
                        </li>
                    </ul>
                    <div id="polyglotLanguageSwitcher">
                        <form action="#">
                            <select id="polyglot-language-options">
                                <option id="es" href="?lang=es" value="es">Espa&ntilde;ol</option>
                                <option id="en" href="?lang=en" value="en">English</option>
                                <option id="fr" href="?lang=fr" value="fr">Fran&ccedil;ais</option>
                                <option id="jp" href="?lang=jp" value="jp">日本語</option>
                                <option id="it" href="?lang=it" value="it">Italiano</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright center">
            <p class="hide-on-small-only"><span lang="es">Hecho por </span>Rolando Romero, Miguel Sanchez, Ricardo Lara y Omar Zu&ntilde;iga.</p>
            <p>IPN - ESCOM &copy; 2016</p>
        </div>
    </footer>
    <!-- #footer -->

</div>
<!-- #wrapper -->

<!-- Modal Movil "Disponibles Ahora" -->
<div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
        <h5 lang="es">Disponibles Ahora</h5>
        <table class="striped centered" name="servi">
            <?php include('scripts/servi.php') ?>
        </table>
    </div>
    <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-teal btn-flat" lang="es">Regresar</a>
    </div>
</div>

<!-- Modal Movil Notificacion -->
<div id="notify-modal" class="modal bottom-sheet-up">
    <form id="notifyform-m" class="col s12" action="javascript:submitnotify(1);">
    <div class="modal-content center">
        <h5 lang="es">Servicio de Notificaciones</h5>
                    <div id="progress-m" class="progress">
                <div class="indeterminate"></div>
            </div>
        <p class="flow-text2" lang="es">Dejanos tu correo y te enviaremos una notificación cuando el salón este <a lang="es">disponible</a></p>.
            <div class="row">
                <div class="input-field col s9 m6 l9 offset-m2">
                    <i class="material-icons prefix" style="margin-top:6px;">account_circle</i>
                    <input id="email" name="email" type="email" value="" class="validate" required>
                     <label for="email">Email</label>
                </div>
                <input id="salonSel-hidden-m" type="hidden" name="Salon" value="">
                <input id="lang-m" type="hidden" name="lang" value="">
                <div class="input-field col s3 m2 l3 ">
                    <select name="salon" disabled>
                        <option id="salonSel-m" selected></option>
                    </select>
                    <label lang="es">Salón</label>
                </div>
            </div>

    </div>
    <div class="modal-footer">
        <button class="right modal-action btn-flat waves-effect waves-light" id="submit" lang="es">Enviar
            <i class="material-icons right">send</i>
        </button>
        <a class="left modal-action modal-close waves-effect waves-teal btn-flat" lang="es">Regresar</a>
    </div>
    </form>
</div>


<?php include_once ( 'include/js_body.php') ?>

<!--SPOOKY SCARY SKELETONS 
<script>
        $(function() {
            var i = 0;
            var colors = ["#FF0000", "#FFFF00", "#00FF00", "#00FFFF", "#0000FF"];
            setInterval(function() {
                var color = colors[i = i++ > 4 ? 0 : i];
                $("meta[name='theme-color']").attr('content', color);
                $("#x").text(color);
            }, 500);
        });
    </script>
-->
<script>
  function notify(salon,flag) {
    if(!flag){
        document.getElementById("salonSel").innerHTML = salon;
        document.getElementById("salonSel-hidden").value = salon;
        document.getElementById("lang").value = Cookies.get('langCookie');
        document.getElementById('progress').style.display = "block";
        document.getElementById("progress").style.visibility = "hidden";
        document.getElementById("done").style.display = "none";
        $('select').material_select();
    }else{
        document.getElementById("salonSel-m").innerHTML = salon;
        document.getElementById("salonSel-hidden-m").value = salon;
        document.getElementById("lang-m").value = Cookies.get('langCookie');
        document.getElementById("progress-m").style.visibility = "hidden";
        $('select').material_select();
        $('#notify-modal').openModal();
        $("meta[name='theme-color']").attr('content', "#FFFFFF");
    }
  }



  $(document).ready(function() {
    //Funcion para mover servi flex de acuerdo a notify - Desactivado
    /*
    var suma = $('#Proximos').outerHeight()+$('#report-card').outerHeight();
    if ($('#servi_flex').outerHeight() < suma){
        console.log("keeplayout: "+$('#Proximos').outerHeight());
        $('#scroll').animate( {'min-height': suma+16 } );
        var scroller = true;
    }*/

    var original=$('#Proximos').outerHeight();
    $(document).on('click.card', '.card', function (e) {
      if ($(this).find('> .card-reveal2').length) {
        if ($(e.target).is($('.card-reveal2 .card-title')) || $(e.target).is($('.card-reveal2 .card-title i'))) {
          // Make Reveal animate down and display none
          $(this).find('.card-reveal2').velocity(
            {translateY: 0}, {
              duration: 225,
              queue: false,
              easing: 'easeInOutQuad',
              complete: function() { 

                $(this).css({ display: 'none'}); 
              }
            }
          );
          $('#Proximos').animate( {height: original } );
          //Funcion para mover servi flex de acuerdo a notify - Desactivado
          //if(scroller) $('#scroll').animate( {'min-height': original+$('#report-card').outerHeight()+16 } ); 
        }
        else if ($(e.target).is($('.card .activator')) ||
                 $(e.target).is($('.card .activator i')) ) {
          $(e.target).closest('.card').css('overflow', 'hidden');
          $(this).find('.card-reveal2').css({ display: 'block'}).velocity("stop", false).velocity({translateY: '100%'}, {duration: 300, queue: false, easing: 'easeInOutQuad'});
          console.log($('#Proximos').outerHeight());
          $('#Proximos').animate( {height: $('#Notify').height() } );
          //Funcion para mover servi flex de acuerdo a notify - Desactivado
          //if(scroller) $('#scroll').animate( {'min-height': $('#Notify').height()+$('#report-card').outerHeight()+16 } );         
        }
      }

      $('.card-reveal2').closest('.card').css('overflow', 'hidden');

    });

  });


  function submitnotify(flag) {
    if(!flag){
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
    }else{
        document.getElementById('progress-m').style.visibility = "visible"
        var myData = $('#notifyform-m').serializeArray();
        $.ajax({
        url: 'scripts/agregar.php',
        type: 'POST',
        data: $.param(myData),
        success: function(msg) {
            setTimeout(function() {
                $('#notify-modal').closeModal();
                toastr.success('<span lang="es">Listo! Nosotros te avisamos</span>', '',{positionClass: "toast-bottom-center",
                      showDuration: 1000,
                      hideDuration: 500,
                      showEasing: "linear",
                      showMethod: "fadeIn",
                      hideMethod: "fadeOut"
                });
            }, 3000);

        }
    });
    }
  }




</script>



</body>

</html>