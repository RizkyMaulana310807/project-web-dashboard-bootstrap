<?php
include "connect.php";
if (isset($_POST['value'])) {
    $value = $_POST['value'];
    echo "Received value: " . $value;
    echo $value;
}
?>