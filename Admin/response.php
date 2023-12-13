<?php
    $photo_name = $_FILES['photo']['name'];
    $photo_path = $_FILES['photo']['tmp_name'];
    $path = './Draft/'.$photo_name;
    move_uploaded_file($photo_path,$path);
    echo $path;
?>