<?php
session_start();
$conn = new mysqli("localhost","root","","tendo_school");
if($conn->connect_error){
    die("Database Connection Failed");
}
function grade($total){
    if($total >= 75){ return "A"; }
    elseif($total >= 60){ return "B"; }
    elseif($total >= 45){ return "C"; }
    elseif($total >= 30){ return "D"; }
    else{ return "F"; }
}
?>

