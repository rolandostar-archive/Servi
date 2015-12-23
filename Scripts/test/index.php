<html>
    <body>
        <form name="form" method="post">
            <input type="text" name="text_box" size="50"/>
            <input type="submit" id="search-submit" value="submit" />
        </form>
    </body>
</html>
<?php
    if(isset($_POST['text_box'])) { //only do file operations when appropriate
        $a = $_POST['text_box'];
        $myFile = "t.txt";
        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, $a);
        fclose($fh);
    }
?>