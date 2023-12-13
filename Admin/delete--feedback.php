<?php
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $connect = new mysqli('localhost','root','','my--store');
        $result = $connect->query("DELETE FROM `feedback` WHERE id = $id");
        if($result == true){
            header('location: ./feedback.php');
            die();
        }
    }
?>