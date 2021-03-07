<?php include("header.php");?>
<a href="index.php"><button class="btn btn-primary">Home</button></a>
<br>
<br>
<div class="row">
<div class="col-md-1">
</div>  
<div class="col-md-10">
<center>
<form name="user_form" id="user_form" class="form-horizontal" enctype="multipart/form-data" action="" method="post">
 
 <div class="panel panel-default">
    <div class="panel-heading">Registration Form</div>
    <div class="panel-body">

<span class="text-danger"> * Indicates Mandatory fields</span>
 
<div class="panel panel-default">
    <div class="panel-body">
    <div class="form-group">
    <label class="control-label col-sm-2" for="firsttname"><span class="text-danger"> * </span>Type:</label>
    <div class="col-sm-10">
      <select class="form-control" id="utype" name="utype">
        <option value="0">Trainee</option>
        <option value="1">Trainer</option>
      </select>
    </div>
</div>
</div>
</div>

 <div class="panel panel-default">
    <div class="panel-heading">Personal Details</div>
    <div class="panel-body">
    <div class="form-group">
    <label class="control-label col-sm-2" for="firsttname"><span class="text-danger"> * </span>First Name:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">
    
    </div>
    <label class="control-label col-sm-2" for="firsttname">Last Name:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="text-danger"> * </span>Email: </label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="email" name="emailid" placeholder="Enter Email Id">
    </div>
 <label class="control-label col-sm-2" for="email">Second Email: </label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="aemail" name="aemailid" placeholder="Enter Alternative Email Id">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="contactno"><span class="text-danger"> * </span>Phone No:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Enter Phone No">
    </div>
    <label class="control-label col-sm-2" for="pwd"><span class="text-danger"> * </span>BirthDate:</label>
    <div class="col-sm-4">
      <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Birthdate">
    </div>
 </div>

 <div class="form-group" >
    <label class="control-label col-sm-2" for="file">Image:</label>
    <div class="col-sm-4">
      <input type="file" class="form-control" id="file" name="file" accept="image/*">
    </div>
  </div>
    </div>
  </div>


<div class="panel panel-default">
    <div class="panel-heading">Emergency Contact</div>
    <div class="panel-body">
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Relation</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="erelation" name="erelation" placeholder="Enter your relation with emergency contact">
    </div>
  </div>

         <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Name:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="econtactname" name="econtactname" placeholder="Enter your emergency contact's name">
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Mobile No:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="econtactno" name="econtactno" placeholder="Enter your emergency contact's mobile number">
    </div>
  </div>

</div></div>  

<div class="form-group">
    <div class="col-sm-3"></div>
      <input type="submit" name="submit" id="submit" class="btn btn-md btn-success col-sm-2" value="Submit" >
 <div class="col-sm-2"></div>
      <input type="reset" name="reset" class="btn btn-md btn-primary col-sm-2" value="Reset">
       <div class="col-sm-3"></div>
   
  </div>

</div></div></form></center></div>


<div class="col-md-1"></div>
</div></div>

<script type="text/javascript">
$("document").ready(function(){
      $("#submit").click(function(){  
            $("#user_form").validate({
                //errorElement: "div",
                 errorClass: 'text-danger',
                rules: {
                  firstname :{required:true,
                              maxlength:50}, 
                  lastname :{
                     maxlength:50
                    },
                  emailid :{required:true, maxlength:50, email:true}, 
                  aemailid :{maxlength:50, email:true}, 
                  contactno :{required:true, maxlength:20, minlength:8},
                  dob :{required:true},
                  erelation :{maxlength:50}, 
                  econtactname :{maxlength:50}, 
                  econtactno :{maxlength:50}
                },
                messages: {
                  firstname :{required:"Please enter Firstname.", maxlength:"Firstname will accept maximum of 50 characters"},
                  lastname :{ maxlength:"Lastname will accept maximum of 50 characters"},
                  emailid :{required:"Please enter Email Id", maxlength:"Email will accept maximum of 50 characters", email:"Please enter valid email id"},
                  aemailid :{maxlength:"Email will accept maximum of 50 characters", email:"Please enter valid email id"},  
                  contactno :{required:"Please enter Phone No.", maxlength:"Please enter phone no maximum of 20 characters.", minlength:"Please enter contact no atleast 8 characters."},
                  dob :{required:"Please add your Birthdate"},
                  erelation :{maxlength:"Relation name will accept maximum of 50 characters"}, 
                  econtactname :{maxlength:"Emergency contact name will accept maximum of 50 characters"}, 
                  econtactno :{maxlength:"Emergency contact number will accept maximum of 50 characters"}
              } 
                             
            });//End add form validation 
 
    });

});

</script>
</body></html>
 