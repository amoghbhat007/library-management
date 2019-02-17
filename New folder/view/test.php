<?php

date_default_timezone_set('Asia/Kolkata');
        $date = date('m/d/Y h:i:s a', time());
        $fileHandle=fopen("../view/data.txt",'a');
        fwrite($fileHandle, $date);
    fclose($fileHandle);


?>