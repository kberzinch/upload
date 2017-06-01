<?php

require_once "config.php";

$count = count($_FILES["file"]["name"]);

if ($count === 0) {
    die("No files selected.");
}

for ($i = 0; $i < $count; $i++) {
    $filename = basename($_FILES["file"]["name"][$i]);
    $target = $config['target_directory'] . $filename;
    if (file_exists($target)) {
        echo $filename . " already exists on the server.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target)) {
            if ($config['files_are_accessible']) {
                echo "<a href=\"".$config['url']."/".$config['target_directory']
                    ."/".$filename."\">".$filename."</a><br>";
            } else {
                echo $filename." uploaded<br>";
            }
        } else {
            echo "Error uploading ".$filename."<br>";
        }
    }
}

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'From: '.$config['email']['from'];

mail(
    $config['email']['to'],
    "[uploads] ".$count." file".($count === 1 ? "" : "s")." uploaded from ".$_SERVER['REMOTE_ADDR'],
    ob_get_contents(),
    implode("\r\n", $headers)
);
