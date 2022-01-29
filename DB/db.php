<?php

    //$connection =mysqli_connect('localhost','root','','studentplatform_pdo')

    $dns        ='mysql:host=localhost;dbname=studentplatform_pdo'; //dns => Database Name and Server
    $username   ='root';
    $password   ='';
    $options    =[];


    try{
        $connection= new PDO($dns,$username,$password,$options);
        // echo 'DB Connected Successfully';
    }
    catch(PDOException $e){
        echo "<pre>";
        echo $e->getMessage();
    }


?>