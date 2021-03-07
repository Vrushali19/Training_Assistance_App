<?php
//Developed By: Vrushali Kadam

if(isset($_SESSION['error'])){ $error=$_SESSION['error']; unset($_SESSION['error']);} 
if(isset($_SESSION['success'])){ $success=$_SESSION['success']; unset($_SESSION['success']);}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Training Assistance App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
</head>
<body>

<div class="container">

<div class="row">
<div class="col-md-12">
<center><h3>Training Assistance App</h3></center>
<hr />
</div>
</div>
<center>
 <div class="text-danger"><?php echo isset($error)?  $error:'';?></div>
   <div class="text-success"><?php echo isset($success)?  $success:'';?></div>
</center>
