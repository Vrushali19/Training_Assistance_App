<?php 
require_once ("class/DBController.php");
class User
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
//function for addubg user
    function addUser($fname, $lname, $emailid, $contactno, $bdate, $ename, $eRelation, $econtact, $rtype, $aemailid, $rollno,$upload_image) {
    $query = "INSERT INTO tblusers (FirstName,LastName,EmailId,ContactNumber,BDate,EName,ERelation,EContact,RType,AEmailId,RollNo,Image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $paramType = "ssssssssisss";
        $paramValue = array(
           $fname,
           $lname,
           $emailid,
           $contactno,
           $bdate,
           $ename,
           $eRelation,
           $econtact,
           $rtype,
           $aemailid,
           $rollno,
           $upload_image
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    

// function for user details
    function getAllUser() {
        $sql = "SELECT FirstName,LastName,EmailId,ContactNumber,BDate,EName,ERelation,EContact,RType,AEmailId,RollNo,Image FROM tblusers ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

//funtion to check unique email
    function check_user($email)
    {
        $sql = "SELECT id FROM tblusers WHERE EmailId='$email'";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

//function to create trainee roll  no
    function create_trainee_rollno($fname,$lname,$bdate)
    {
        $fname_str=substr($fname,0,2);
        $lname_str=substr($lname,0,2);
        $bdate=date_create($bdate);
        $bdate_str=date_format($bdate,"ymd");
        $srid="";
        $sql = "SELECT RollNo FROM tblusers WHERE RType=0 ORDER BY id DESC LIMIT 1";
        $result = $this->db_handle->runBaseQuery($sql);
        if($result)
        {
        $oldroll=$result[0]['RollNo'];
        $seq_array=explode("-",$oldroll);
        $srid="00".($seq_array[1]+1);
        }else
        {
          $srid="001";
        }
        $rollno=$fname_str.$lname_str.$bdate_str."-".$srid;
        return $rollno;
    }


//function to create roll number for trainer
    function create_trainer_rollno($fname,$lname)
    {
        $fname_array=explode(" ", $fname);
        $fname_str="";
        foreach($fname_array as $fname_word)
        {
          $word_length=strlen($fname_word);

          $fname_str.=$fname_word[0].$fname_word[$word_length-1];
        }
        $lname_length=strlen($lname);
        $lname_str=$lname[0].$lname[$lname_length-1];
         $sql = "SELECT RollNo FROM tblusers WHERE RType=1 ORDER BY id DESC LIMIT 1";
        $result = $this->db_handle->runBaseQuery($sql);
        if($result)
        {
        $oldroll=$result[0]['RollNo'];
        $seq_array=explode("-",$oldroll);
        $srid="00".($seq_array[1]+1);
        }else
        {
          $srid="001";
        }
        $rollno=$fname_str.$lname_str."-".$srid;
        return $rollno;

    }

//image upload function
function upload_image()
{
$target_dir = "upload/user/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    $_SESSION['error']="File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $_SESSION['error']="File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $_SESSION['error']="Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 350000) {
  $_SESSION['error']="Sorry, your file is too large. maximun file size is 3.5 MB";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$_SESSION['error']="Sorry, only JPG, JPEG, PNG & GIF files are allowed";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 return "0";
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    return htmlspecialchars(basename($_FILES["file"]["name"]));
  } else {
    $_SESSION['error']="Sorry, there was an error uploading your file.";
    return "0";
  }
}
    }
}
?>