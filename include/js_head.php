    <!-- Importar JS -->
    <script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>

    <!-- Polyglot -->
    <script src="js/jquery.polyglot.language.switcher.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({
                effect: 'fade',
                testMode: false,
                onChange: function(evt) {
                    Cookies.set('langCookie', evt.selectedItem);
                    window.lang.change(evt.selectedItem);
                }
            });
        });
    </script>

    <!-- Libreria Materialize -->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/init.js"></script>

    <!-- Cookies, Y Lang Para Idioma -->
    <script src="js/js.cookie.js" charset="utf-8" type="text/javascript"></script>
    <script src="js/jquery-lang.js" charset="utf-8" type="text/javascript"></script>
    <script type="text/javascript">
        var lang = new Lang();
        lang.dynamic('en', 'js/langpack/en.json');
        lang.dynamic('it', 'js/langpack/it.json');
        lang.dynamic('fr', 'js/langpack/fr.json');
        lang.dynamic('jp', 'js/langpack/jp.json');
        lang.init({
            defaultLang: 'es'
        });
    </script>
    