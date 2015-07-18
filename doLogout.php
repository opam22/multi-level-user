<?php
session_start();

//hancurkan segala session
session_destroy();
//redirect ke halaman index lagi/ halaman untuk login
header('location:index.php');
?>