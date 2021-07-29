<?php
$con = new mysqli("localhost","root","","pace_web_class");
//check connection
if (mysqli_connect_errno())
 { 
echo "========failed to connect to MySQL: " .mysqli_connect_error();

}else{
 echo "======connected=====" ."<br>";  
}




      
 $name=$_GET ["name"];
 $email=$_GET ["email"];

if(($name!="") && ($email!="")){
$sqlinsertStudentinfo ="INSERT INTO `student_info`( `name`, `email`) VALUES ('". $name ."','". $email ."')";

if ($con->query($sqlinsertStudentinfo) ===TRUE){echo "New student " .$name . "'s information inserted successfully";}
else {echo "Error:" . $sqlinsertStudentinfo . "<br>" .$conn->error;}

}



//echo "Your name is " . $name;
//echo "<br>Your email is ". $email;
//connect d base

//1 user -password
//insert the values to the dbase

?>

<html>
<head>
 <link rel="stylesheet" type="text/css" href="styles.css"/>
    
 <title>Quick Registration
</title>   
    </head>
    <body>
<h1> Thank you</h1>

        <p> Thank you for Registering with us</p>
        
<table>
<tr><th>Student ID</th><th>Name</th><th>Email</th></tr>    
  <?php
    
$sqlselectStudentinfo ="SELECT student_id ,name,email FROM student_info";
$result = mysqli_query($con,$sqlselectStudentinfo); 
    
        
while($row =mysqli_fetch_assoc($result)){
       
?> 
<tr><td><?php echo $row["student_id"] ?> </td><td><?php echo $row["name"]?></td><td><?php echo $row["email"]?></td></tr>
<?php      
}  
     
?>  
</table>   

</body>
</html>