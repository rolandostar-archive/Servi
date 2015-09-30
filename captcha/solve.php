<?php
/*
$filename - file path to captcha
$apikey   - account's API key
$rtimeout - delay between captcha status checks
$mtimeout - captcha recognition timeout

$is_verbose - false(commenting OFF),  true(commenting ON)

additional custom parameters for each captcha:
$is_phrase - 0 OR 1 - captcha has 2 or more words
$is_regsense - 0 OR 1 - captcha is case sensetive
$is_numeric -  0 OR 1 - captcha has digits only
$min_len    -  0 is no limit, an integer sets minimum text length
$max_len    -  0 is no limit, an integer sets maximum text length
$is_russian -  0 OR 1 - with flag = 1 captcha will be given to a Russian-speaking worker

usage examples:
$text=recognize("/path/to/file/captcha.jpg","YOUR_KEY_HERE",true, "antigate.com");

$text=recognize("/path/to/file/captcha.jpg","YOUR_KEY_HERE",false, "antigate.com");  

$text=recognize("/path/to/file/captcha.jpg","YOUR_KEY_HERE",false, "antigate.com",1,0,0,5);  

*/
echo "YOLO";

function recognize(
        $filename = "BotDetectCaptcha3.jpg",
        $apikey = "e8251b594ebff31e8d8cef00042d5ff0",
        $is_verbose = true,
        $sendhost = "anti-captcha.com",
        $rtimeout = 5,
        $mtimeout = 120,
        $is_phrase = 0,
        $is_regsense = 0,
        $is_numeric = 0,
        $min_len = 0,
        $max_len = 0,
        $is_russian = 0)
{
    if (!file_exists($filename))
    {
        if ($is_verbose) echo "file $filename not found\n";
        return false;
    }
    $fp=fopen($filename,"r");
    if ($fp!=false)
    {
        $body="";
        while (!feof($fp)) $body.=fgets($fp,1024);
        fclose($fp);
        $ext=substr($filename,strpos($filename,".")+1);
    }
    else
    {
        if ($is_verbose) echo "could not read file $filename\n";
        return false;
    }
    $postdata = array(
        'method'    => 'base64', 
        'key'       => $apikey, 
        'body'      => base64_encode($body), //������ ���� � �����
        'ext'       => $ext,
        'phrase'    => $is_phrase,
        'regsense'  => $is_regsense,
        'numeric'   => $is_numeric,
        'min_len'   => $min_len,
        'max_len'   => $max_len,
        'is_russian'    => $is_russian,
        
    );
    
    $poststr="";
    while (list($name,$value)=each($postdata))
    {
        if (strlen($poststr)>0) $poststr.="&";
        $poststr.=$name."=".urlencode($value);
    }
    
    if ($is_verbose) echo "connecting to antigate...";
    $fp=fsockopen($sendhost,80);
    if ($fp!=false)
    {
        echo "OK\n";
        echo "sending request...";
        $header="POST /in.php HTTP/1.0\r\n";
        $header.="Host: $sendhost\r\n";
        $header.="Content-Type: application/x-www-form-urlencoded\r\n";
        $header.="Content-Length: ".strlen($poststr)."\r\n";
        $header.="\r\n$poststr\r\n";
        //echo $header;
        //exit;
        fputs($fp,$header);
        echo "OK\n";
        echo "getting response...";
        $resp="";
        while (!feof($fp)) $resp.=fgets($fp,1024);
        fclose($fp);
        $result=substr($resp,strpos($resp,"\r\n\r\n")+4);
        echo "OK\n";
    }
    else 
    {
        if ($is_verbose) echo "could not connect to antigate\n";
        return false;
    }
    
    if (strpos($result, "ERROR")!==false)
    {
        if ($is_verbose) echo "server returned error: $result\n";
        return false;
    }
    else
    {
        $ex = explode("|", $result);
        $captcha_id = $ex[1];
        if ($is_verbose) echo "captcha sent, got captcha ID $captcha_id\n";
        $waittime = 0;
        if ($is_verbose) echo "waiting for $rtimeout seconds\n";
        sleep($rtimeout);
        while(true)
        {
            $result = file_get_contents("http://$sendhost/res.php?key=".$apikey.'&action=get&id='.$captcha_id);
            if (strpos($result, 'ERROR')!==false)
            {
                if ($is_verbose) echo "server returned error: $result\n";
                return false;
            }
            if ($result=="CAPCHA_NOT_READY")
            {
                if ($is_verbose) echo "captcha is not ready yet\n";
                $waittime += $rtimeout;
                if ($waittime>$mtimeout) 
                {
                    if ($is_verbose) echo "timelimit ($mtimeout) hit\n";
                    break;
                }
                if ($is_verbose) echo "waiting for $rtimeout seconds\n";
                sleep($rtimeout);
            }
            else
            {
                $ex = explode('|', $result);
                if (trim($ex[0])=='OK') return trim($ex[1]);
            }
        }
        
        return false;
    }
}
?> 