<?php
    //Establish a connection to the MYSQL database
    $servername = "localhost";
    $uname = "root";
    $upass = "";
    $dbname ="mini_project";

    $conn = new mysqli($servername, $uname, $upass, $dbname);

    //check the connection
    if ($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
    }

    $query = "SELECT * FROM `borrowed_books`";
    $result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="show_customer_details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch the data in table form</title>
</head>
<body>
<div class="form-popup" id="myForm">
<div class="form-container">  
      <h2><center>Student Details</center></h2>
      <form action="customer_details_add.php" method="POST">
          <div class="input-name">
           <i class="fa fa-user"></i>
           <input type="text" placeholder="First Name" class="fname" id="fname" name="fname">

           <span>
                <i class="fa fa-user"></i>
               <input type="text" placeholder="Last Name" class="lname" id="lname" name="lname">
           </span>
          </div>

          <div class="input-name">
           <i class="fa fa-calendar"></i>
           <input type="date" placeholder="date" class="dob" id="dob" name="dob">
          </div>


          <div class="input-name">
             <i class="fa fa-envelope email"></i>
             <input type="email" placeholder="Email" class="email" id="email" name="email">
          </div>       

<!--
          <div class="input-name">
            <i class="fa fa-map-marker"></i>
            <input type="text" placeholder="Address" class="addr" id="addr" name="addr">
          <div>
-->


          <div class="input-name">
             <i class="fa fa-phone"></i>
             <input type="tel" placeholder="Mobile No." class="tel" id="tel" name="tel">
          </div>

       <!--    <div class="input-name">
             <i class="fa fa-map-marker"></i>
             <input type="text" placeholder="Address" class="add" id="addr" name="addr">
            <input type="text" placeholder="Address" class="add" id="addr" name="addr">
          </div>-->
    
          <div class="input-name">
          <label>City</label>
          <select class="City" id="city" name="city">
                 <option>Select a City</option>
                 <option>Nashik</option>
                 <option>Pune</option>
                 <option>Mumbai</option>
                 <option>Dhule</option>
                 <option>Amaravti</option>
                 <option>Nagpur</option>
                 <option>Thane</option>
                 <option>Solhapur</option>
                 <option>Kolhapur</option>
                 <option>Nanded</option>
          </select>
   
          <div class="arrow"></div>
          </div>
         
          <div class="input-name">
           <label>Gender</label>
           <select class="City" id="gender" name="gender">
            <option>Male</option>
            <option>Female</option>
           </select>
         </div>
       
         <div class="input-name">
             <input type="checkbox" class="checkbutton">
             <label>Accept the Terms and Conditions</label>
         </div>
        
         <br>
             <input type="submit" value="ADD" class="button" id="button" name="button">

             
        </form>
    </div>   
</div>




    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <br>
                        <h2>Customer Details</h2>
                    </div>
                    <div class="card-body">
                        <table>
                        <button href="#" class="add" onclick="openForm()">ADD</button><br>
                       <!-- <button type="" class="close" onclick="closeForm()">Delete</button>-->
                        <br><br>
                        <tr class="table-head">
                            <td>id</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>DOB</td>
                            <td>Email</td>
                            <td>Mob No</td>
                            <td>City</td>
                            <td>Gender</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        <tr>
                        <?php
                            while($row = mysqli_fetch_assoc($result))
                            {
                        ?>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['tel']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['gender']; ?></td>

                            <form action="customer_details_update.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <td><button href="" class="button1" name="edit">Edit</button></td>
                            </form>
                            

                            <form action="customer_details_delete.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <td><button href="#" class="button2" name="delete">DELETE</button></td>
                            </form>
                        </tr>
                        <?php
                            }
                        ?>
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>
</html>