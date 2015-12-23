<?php
require('simple_html_dom.php');

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

$html = file_get_html("https://www.saes.escom.ipn.mx", false, stream_context_create($arrContextOptions));

echo "
<html>
<body>
";

/*foreach($html->find('img[id=c_default_ctl00_leftcolumn_loginuser_logincaptcha_CaptchaImage]') as $element) {
       echo "<img class=\"LBD_CaptchaImage\" id=\"c_default_ctl00_leftcolumn_loginuser_logincaptcha_CaptchaImage\" src=\"https://www.saes.escom.ipn.mx";
       echo $element->src;
       echo "\" alt=\"CAPTCHA\" />";
}*/
foreach($html->find('input[id=LBD_VCID_c_default_ctl00_leftcolumn_loginuser_logincaptcha]') as $element2) {
    $key = $element2->value;
    echo $key;
}
/*
foreach($html->find('input') as $element) 
       echo $element->outertext.'<br>';

/*
echo "<p>TTOTOTOTOTOTOTOT</p>
<form action=\"curl.php\" method=\"POST\">
captcha: <input type=\"text\" name=\"cap\"><br>
key: ".$key."<input type=\"hidden\" name=\"key\" value=\"".$key."\"><br>

<input type=\"submit\">
</form>

</body>
</html>
"*/

echo "    <form name=\"aspnetForm\" method=\"post\" action=\"https://www.saes.escom.ipn.mx/default.aspx\" onsubmit=\"javascript:return WebForm_OnSubmit();\" id=\"aspnetForm\">

<input type=\"hidden\" name=\"__EVENTTARGET\" id=\"__EVENTTARGET\" value=\"\" />
<input type=\"hidden\" name=\"__EVENTARGUMENT\" id=\"__EVENTARGUMENT\" value=\"\" />
<input type=\"hidden\" name=\"__VIEWSTATE\" id=\"__VIEWSTATE\" value=\"/wEPDwUJNDM4MjMwNTM1D2QWAmYPZBYCAgMPZBYKAgEPDxYCHghJbWFnZVVybAUVfi9JbWFnZXMvbG9nb3MvNjMucG5nZGQCBQ88KwANAgAPFgIeC18hRGF0YUJvdW5kZ2QMFCsAAgUDMDowFCsAAhYSHgVWYWx1ZQUGSW5pY2lvHglEYXRhQm91bmRnHghTZWxlY3RlZGceBFRleHQFBkluaWNpbx4LTmF2aWdhdGVVcmwFDS9kZWZhdWx0LmFzcHgeB0VuYWJsZWRnHgpTZWxlY3RhYmxlZx4HVG9vbFRpcAUGSW5pY2lvHghEYXRhUGF0aAUNL2RlZmF1bHQuYXNweBQrAAMFBzA6MCwwOjEUKwACFhAfBQUKUmVnbGFtZW50bx8CBQpSZWdsYW1lbnRvHwYFGC9SZWdsYW1lbnRvL0RlZmF1bHQuYXNweB8JBQpSZWdsYW1lbnRvHwdnHwhnHwoFGC9yZWdsYW1lbnRvL2RlZmF1bHQuYXNweB8DZ2QUKwACFhAfBQUFQXl1ZGEfAgUFQXl1ZGEfBgURL0F5dWRhL0F5dWRhLmFzcHgfCQUFQXl1ZGEfB2cfCGcfCgURL2F5dWRhL2F5dWRhLmFzcHgfA2dkZAIID2QWAgIDDw8WAh8FZWRkAgkPPCsADQEADxYCHwFnZGQCCg9kFgICAQ8WAh4HVmlzaWJsZWhkGAEFDmN0bDAwJG1haW5tZW51Dw9kBQZJbmljaW9kOU0swjPS9o0dnUw48KNtDvZqelo=\" />

<script type=\"text/javascript\">
//<![CDATA[
var theForm = document.forms['aspnetForm'];
if (!theForm) {
    theForm = document.aspnetForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>


<script src=\"https://www.saes.escom.ipn.mx/WebResource.axd?d=-bwXUCbIlaZUIHCqOu-YPakapq2FZWJkdr6cWtDg4rwZ_4thJfnw444mM2FRA-KDsfh-Qo89ptiGrUfGol7VxT66jI41&amp;t=635588399086469712\" type=\"text/javascript\"></script>
<script src=\"https://www.saes.escom.ipn.mx/WebResource.axd?d=ePWu3HQGG3yWOof82EBR64Lk7Gvo2-BzWKvi24P8qdjfKsups9nCFkZAYqZEDB-0YteTs4JqBcCzlMbjlhBJuo0pbxU1&amp;t=635588399086469712\" type=\"text/javascript\"></script>
<script src=\"https://www.saes.escom.ipn.mx/WebResource.axd?d=6-pL4TZw0U-P7R-Sl36d-lWM6MgMQ5bKJBr84yHU-zNsWPFBRCkfWxB1athhJPirslsa8NJthSt891fBbFf4F2Mo_lQ1&amp;t=635588399086469712\" type=\"text/javascript\"></script>

<script type=\"text/javascript\">
//<![CDATA[
function WebForm_OnSubmit() {
if (typeof(ValidatorOnSubmit) == \"function\" && ValidatorOnSubmit() == false) return false;
return true;
}
//]]>
</script>


    <input type=\"hidden\" name=\"__VIEWSTATEGENERATOR\" id=\"__VIEWSTATEGENERATOR\" value=\"CA0B0334\" />
    <input type=\"hidden\" name=\"__EVENTVALIDATION\" id=\"__EVENTVALIDATION\" value=\"/wEWBQKW4enXBgKplu7qAwKz5ZDgDwKlyZNfAqbvnfYMvrAHNTnCBOsX9pdowV0FCzhSkgg=\" />

                                                                <input name=\"ctl00\$leftColumn\$LoginUser\$UserName\" type=\"text\" size=\"13\" id=\"ctl00_leftColumn_LoginUser_UserName\" accesskey=\"u\" tabindex=\"60\" class=\"textEntry\" autocomplete=\"off\" /><br />


                                                                <input name=\"ctl00\$leftColumn\$LoginUser\$Password\" type=\"password\" size=\"13\" id=\"ctl00_leftColumn_LoginUser_Password\" accesskey=\"p\" tabindex=\"61\" class=\"passwordEntry\" autocomplete=\"off\" /><br />


                                                                <input name=\"ctl00\$leftColumn\$LoginUser\$CaptchaCodeTextBox\" type=\"text\" size=\"13\" id=\"ctl00_leftColumn_LoginUser_CaptchaCodeTextBox\" accesskey=\"c\" tabindex=\"62\" class=\"textEntry\" autocomplete=\"off\" />
            <img src=\"https://www.saes.escom.ipn.mx/BotDetectCaptcha.ashx?get=image&amp;c=c_default_ctl00_leftcolumn_loginuser_logincaptcha&amp;t="<img src=\"https://www.saes.escom.ipn.mx/BotDetectCaptcha.ashx?get=image&amp;c=c_default_ctl00_leftcolumn_loginuser_logincaptcha&amp;t=".$key."\" alt=\"CAPTCHA\" />"\" alt=\"CAPTCHA\" />
            <input type=\"hidden\" name=\"LBD_VCID_c_default_ctl00_leftcolumn_loginuser_logincaptcha\" id=\"LBD_VCID_c_default_ctl00_leftcolumn_loginuser_logincaptcha\" value=\"".$key."\" />
            <input type=\"hidden\" name=\"LBD_BackWorkaround_c_default_ctl00_leftcolumn_loginuser_logincaptcha\" id=\"LBD_BackWorkaround_c_default_ctl00_leftcolumn_loginuser_logincaptcha\" value=\"0\" />
          </div>

        <br />
                                                            <input type=\"submit\" name=\"ctl00\$leftColumn\$LoginUser\$LoginButton\" value=\"Iniciar\" onclick=\"javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00\$leftColumn\$LoginUser\$LoginButton&quot;, &quot;&quot;, true, &quot;LoginUserValidationGroup&quot;, &quot;&quot;, false, false))\" id=\"ctl00_leftColumn_LoginUser_LoginButton\" class=\"button\" />
                                                           
    
<script type=\"text/javascript\">
//<![CDATA[
var Page_Validators =  new Array(document.getElementById(\"ctl00_leftColumn_LoginUser_UserNameRequired\"), document.getElementById(\"ctl00_leftColumn_LoginUser_PasswordRequired\"), document.getElementById(\"ctl00_leftColumn_LoginUser_CaptchaRequiredValidator\"));
//]]>
</script>

<script type=\"text/javascript\">
//<![CDATA[
var ctl00_leftColumn_LoginUser_UserNameRequired = document.all ? document.all[\"ctl00_leftColumn_LoginUser_UserNameRequired\"] : document.getElementById(\"ctl00_leftColumn_LoginUser_UserNameRequired\");
ctl00_leftColumn_LoginUser_UserNameRequired.controltovalidate = \"ctl00_leftColumn_LoginUser_UserName\";
ctl00_leftColumn_LoginUser_UserNameRequired.errormessage = \"El nombre de usuario es obligatorio\";
ctl00_leftColumn_LoginUser_UserNameRequired.validationGroup = \"LoginUserValidationGroup\";
ctl00_leftColumn_LoginUser_UserNameRequired.evaluationfunction = \"RequiredFieldValidatorEvaluateIsValid\";
ctl00_leftColumn_LoginUser_UserNameRequired.initialvalue = \"\";
var ctl00_leftColumn_LoginUser_PasswordRequired = document.all ? document.all[\"ctl00_leftColumn_LoginUser_PasswordRequired\"] : document.getElementById(\"ctl00_leftColumn_LoginUser_PasswordRequired\");
ctl00_leftColumn_LoginUser_PasswordRequired.controltovalidate = \"ctl00_leftColumn_LoginUser_Password\";
ctl00_leftColumn_LoginUser_PasswordRequired.errormessage = \"La contraseña es obligatoria\";
ctl00_leftColumn_LoginUser_PasswordRequired.validationGroup = \"LoginUserValidationGroup\";
ctl00_leftColumn_LoginUser_PasswordRequired.evaluationfunction = \"RequiredFieldValidatorEvaluateIsValid\";
ctl00_leftColumn_LoginUser_PasswordRequired.initialvalue = \"\";
var ctl00_leftColumn_LoginUser_CaptchaRequiredValidator = document.all ? document.all[\"ctl00_leftColumn_LoginUser_CaptchaRequiredValidator\"] : document.getElementById(\"ctl00_leftColumn_LoginUser_CaptchaRequiredValidator\");
ctl00_leftColumn_LoginUser_CaptchaRequiredValidator.controltovalidate = \"ctl00_leftColumn_LoginUser_CaptchaCodeTextBox\";
ctl00_leftColumn_LoginUser_CaptchaRequiredValidator.errormessage = \"CAPTCHA es obligatorio\";
ctl00_leftColumn_LoginUser_CaptchaRequiredValidator.validationGroup = \"LoginUserValidationGroup\";
ctl00_leftColumn_LoginUser_CaptchaRequiredValidator.evaluationfunction = \"RequiredFieldValidatorEvaluateIsValid\";
ctl00_leftColumn_LoginUser_CaptchaRequiredValidator.initialvalue = \"\";
//]]>
</script>


<script type=\"text/javascript\">
//<![CDATA[
var ctl00_mainmenu_Data = new Object();
ctl00_mainmenu_Data.disappearAfter = 500;
ctl00_mainmenu_Data.horizontalOffset = 0;
ctl00_mainmenu_Data.verticalOffset = 0;
ctl00_mainmenu_Data.staticHoverClass = 'ctl00_mainmenu_9 hover';
ctl00_mainmenu_Data.staticHoverHyperLinkClass = 'ctl00_mainmenu_8 hover';
ctl00_mainmenu_Data.iframeUrl = '/WebResource.axd?d=zBipjfShOa7890kV9lRkHxN1NxfemP8vapdW3jqCBaWM1rpbHb1EBPxfZ_8xN66t86uxoRCImBppbZCeX63ucine2jQ1&t=635588399086469712';
var ctl00_subMenu_Data = new Object();
ctl00_subMenu_Data.disappearAfter = 500;
ctl00_subMenu_Data.horizontalOffset = 0;
ctl00_subMenu_Data.verticalOffset = 0;
ctl00_subMenu_Data.hoverClass = 'ctl00_subMenu_16 hover';
ctl00_subMenu_Data.hoverHyperLinkClass = 'ctl00_subMenu_15 hover';
ctl00_subMenu_Data.staticHoverClass = 'ctl00_subMenu_14 hover';
ctl00_subMenu_Data.staticHoverHyperLinkClass = 'ctl00_subMenu_13 hover';
ctl00_subMenu_Data.iframeUrl = '/WebResource.axd?d=zBipjfShOa7890kV9lRkHxN1NxfemP8vapdW3jqCBaWM1rpbHb1EBPxfZ_8xN66t86uxoRCImBppbZCeX63ucine2jQ1&t=635588399086469712';

var Page_ValidationActive = false;
if (typeof(ValidatorOnLoad) == \"function\") {
    ValidatorOnLoad();
}

function ValidatorOnSubmit() {
    if (Page_ValidationActive) {
        return ValidatorCommonOnSubmit();
    }
    else {
        return true;
    }
}
        //]]>
</script>
</form>
</body>
</html>


"

?>