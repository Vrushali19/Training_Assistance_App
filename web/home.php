<?php include("header.php");?>
<a href="index.php?action=registration"><button class="btn btn-primary">Registration</button></a>
<br>
<br>
<div class="row">
<div class="table-responsive">    
  <div class="text-danger"><?php if(isset($_SESSION['error'])){ echo  $_SESSION['error']; } ?></div>
   <div class="text-success"><?php if(isset($_SESSION['success'])){ echo  $_SESSION['success']; } ?></div>            
<table id="mytable" class="table table-striped table-bordered" style="width:100%">
<thead>
<th>Sr. No</th>
<th>Profile</th>
<th>First Name</th>
<th>Last Name</th>
<th>Birthdate</th>
<th>Contact No.</th>
<th>Email</th>
<th>Alternative email</th><th>Emergency Contact</th>
<th>Type</th>

<th>Roll No.</th>
</thead>
<tbody>
                    <?php
                    if (!empty($result)) {
                    $i=1;
                        foreach ($result as $rdata) {
                           
                    echo "<tr><td>".$i."</td><td>";
                  if($rdata['Image']){
                   echo "<img src='upload/user/".$rdata['Image']."' width='100px' alt='profile_pic'>";

                  }else{ echo "<img src='upload/user/no-image.jpg' width='100px' alt='profile_pic'>"; }

                   echo "</td><td>".$rdata["FirstName"]."</td><td>".$rdata["LastName"]."</td><td>".$rdata['BDate']."</td><td>".$rdata["ContactNumber"]."</td><td>".$rdata["EmailId"]."</td><td>".$rdata['AEmailId']."</td><td>Name: ".$rdata['EName']."<br> Relation: ".$rdata['ERelation']."<br> Contact:".$rdata['EContact']."</td><td>";
                    if($rdata['RType']==1){
                    echo "Trainer";
                  }else{
                   echo "Trainee";
                }

                echo "</td><td>".$rdata['RollNo']."</td></tr>";
                       $i++; 
                        }
                    }
                    ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
    
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $("document").ready(function(){

   var oTable = $('#mytable').DataTable({
                    "columns":[
                        { "bsearchable": false, "bSortable": false },
                          { "bsearchable": false, "bSortable": false },
                         null,
                         null,
                           null,
                             null,
                         null,
                         null,
                           null,   
                           null,
                           null      
                    ],
                    "dom" : '<tlip>',
                    "iDisplayLength":25,
                    "lengthMenu": [ 25, 50, 75, 100 ]
                });
 });
</script>
</body>
</html>