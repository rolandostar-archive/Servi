<?php

function IsChecked($chkname,$value)
{
    if(!empty($_POST[$chkname]))
    {
        foreach($_POST[$chkname] as $chkval)
        {
            if($chkval == $value)
            {
                return true;
            }
        }
    }
    return false;
}


$con=mysqli_connect("localhost","root","BH2Ml1t4vu","servi");
// Check connection
if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($con) . PHP_EOL;


$query = "SELECT * FROM horario";

if ($result = mysqli_query($con, $query)) {
    $i = 0;
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $i++;

        if(IsChecked('id',$i)) { 
            $sql = "INSERT INTO reporte (id, id_horario,ip_alumno,estado,reported_on) VALUES (NULL, ".$i.",'".$_SERVER['REMOTE_ADDR']."','1',NOW())";
            echo "<br><br>".$sql;
            if (!$con->query($sql)) {
                printf("Errormessage: %s\n", $con->error);
            }else{
                printf("#%d: genre insetion succesfull",$i);
            }
        }
    }
    /* free result set */
    mysqli_free_result($result);
}
mysqli_close($con);


?>