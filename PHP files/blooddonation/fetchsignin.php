<?php
require_once 'config.php';
       $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

  $username=$_POST["username"];
  
  $res=array("Fetching userdetails","Error");
  $mysqliselect="Select * from bdsignup where username='$username'";
  $result=mysqli_query($conn,$mysqliselect);
  if(mysqli_num_rows($result)>0)
 { 
             $response=array();
             while($row=mysqli_fetch_array($result))
             {
               	array_push($response,array("name"=>$row[0],"mobile"=>$row[1],"email"=>$row[3],"state"=>$row[5],"district"=>$row[6]));
              }
             echo json_encode(array("server_response"=>$response));     
    }
else {
              echo json_encode($res[1]);
     }    
  mysqli_close($conn);
?>