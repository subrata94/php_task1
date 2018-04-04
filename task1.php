<?php

//require_once 'db/Database.php';

if(isset($_POST['submit'])){
    echo "Hello ".$_POST['name'];
}else{
    include 'view/task1.html';
}
