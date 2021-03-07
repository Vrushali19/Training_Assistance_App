<?php
session_start();
require_once ("class/DBController.php");
require_once ("class/User.php");

$db_handle = new DBController();

if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}else
{
    $action="";
}

switch ($action) {
    
case "registration":
if (isset($_POST['submit'])) {

$fname=trim($_POST['firstname']);
$lname=trim($_POST['lastname']);
$emailid=trim($_POST['emailid']);
$contactno=trim($_POST['contactno']);
$bdate=trim($_POST['dob']);
$ename=trim($_POST['econtactname']);
$eRelation=trim($_POST['erelation']);
$econtact=trim($_POST['econtactno']);
$rtype=$_POST['utype'];
$aemailid=trim($_POST['aemailid']);
$rollno="";
$user = new User();

if($fname=="" || $emailid=="" || $contactno=="" || $bdate=="")
{
    $_SESSION['error']="Firstname , Email Id, Contact Number, Birthdate Are Mandatory Feilds.";
}else if((strlen($fname)>50) || (strlen($emailid)>50) || (strlen($lname)>50) || (strlen($aemailid)>50) || (strlen($eRelation)>50) || (strlen($ename)>50) || (strlen($econtact)>50))
{
     $_SESSION['error']="First name, Last name, Email, Alternate email, Relation, Emergency contact's name and contact number will accept maximum of 50 characters.";
}else if((strlen($contactno)<8) || (strlen($contactno)>20))
{
      $_SESSION['error']="Phone number fields will accept a maximum of 20 characters and a minimum of 8 characters";
}else if (!filter_var($emailid, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error'] = "Invalid email format";
}
else {
if($rtype==0)
{
 $rollno=$user->create_trainee_rollno($fname,$lname,$bdate);
}else if($rtype==1)
{
 $rollno=$user->create_trainer_rollno($fname,$lname);
}

$tdata=$user->check_user($emailid);
 if($tdata)
 {
       $_SESSION['error']="Email Id Allready Available";
 }else
 {
         if($_FILES['file']['name'] != '') 
         {
            $upload_image=$user->upload_image();    
         }else
         {
            $upload_image="";
         }
           if($upload_image!="0")
            {
            $insertId = $user->addUser($fname,$lname,$emailid,$contactno,$bdate,$ename,$eRelation,$econtact,$rtype,$aemailid,$rollno,$upload_image);
            if (empty($insertId)) {
                 $_SESSION['error']="Problem in Adding New Record";
            } else {
                 $_SESSION['sucess']="User Added Sucessfully";
                header("Location: index.php");
            }
           }
         
        }
}
}
            require_once "web/registration.php";
    
        break;
    
    default:
        $user = new User();
        $result = $user->getAllUser();
        require_once "web/home.php";
        break;
}
?>