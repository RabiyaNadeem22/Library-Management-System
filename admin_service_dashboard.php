<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>
    <style>
    .innerright,label
{
    color: #5411ac;
    font-weight:bold;
}

      

.imglogo {
            margin: auto;
            height: 20%;
            width: 60%;
        }

.innerdiv {
    text-align: center;
    /* width: 500px; */
    margin: 20px;
}
input{
    margin-left:20px;
    margin-bottom: 10px;
    margin-top: 10px; 
     /* margin: 0 auto;
    align-items:center; */
}
.leftinnerdiv {
    float: left;
    width: 30%;
   
}

.rightinnerdiv {
    float: right;
    width: 65%;
}

.innerright {
    background-color: white;
}

.bluebtn {
    background-color: #5411ac;
            color: white;
            width: 95%;
            height: 60px;
            margin-top: 8px;
            border-radius: 10px;
}
.bluebtn:hover {
            border: 4px solid #390b74;
        }

        .bluebtn:active {
            text-decoration: underline;
        }
        .bbtn{
            text-decoration: none;
            border-radius: 3px solid black;
            margin: 12px;
        }

.bluebtn,
a {
    text-decoration: none;
    color: white;
    font-size: large;
}

th{
    background-color: #5c45b5 ;
    color: white;
   
    margin-bottom: 2px;
}
td{
    /* background-color: #8a738a ; */
    color: black;
    border:1px solid black;
}
td, a{
    color:black;
    border:1px solid black;
}

    </style>
    <body>
    <div>
     
    <?php
   include("data_class.php");

$msg="";

   if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

if($msg=="done"){
    echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
}
elseif($msg=="fail"){
    echo "<div class='alert alert-danger' role='alert'>Fail</div>";
}

    ?>



        <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="imglogo" src="images/logo.png"/></div>
            <hr>
</br>

            <div class="leftinnerdiv">
                <Button class="bluebtn"> ADMIN</Button>
                <Button class="bluebtn" onclick="openpart('addbook')" >ADD BOOK</Button>
                <Button class="bluebtn" onclick="openpart('bookreport')" > BOOK RECORD</Button>
                <Button class="bluebtn" onclick="openpart('bookrequestapprove')"> BOOK REQUESTS</Button>
                <Button class="bluebtn" onclick="openpart('addperson')"> ADD STUDENT/TEACHER</Button>
                <Button class="bluebtn" onclick="openpart('studentrecord')"> STUDENT RECORD</Button>
                <Button class="bluebtn"  onclick="openpart('issuebook')"> ISSUE BOOK</Button>
                <Button class="bluebtn" onclick="openpart('issuebookreport')"> ISSUED BOOKS RECORD</Button>
                <a href="index.php"><Button class="bluebtn" > LOGOUT</Button></a>
            </div>

            <div class="rightinnerdiv">   
            <div id="bookrequestapprove" class="innerright portion" style="display:none">
            <Button class="bluebtn" >BOOK REQUEST APPROVE</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->requestbookdata();
            $recordset=$u->requestbookdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Person Name</th><th>person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
               // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                 $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'>APPROVE</a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="addbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="bluebtn" >ADD NEW BOOK</Button>
        </br>  </br>
            <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">
            <label>Book Name:</label><input type="text" name="bookname"/>
            </br>
            <label>Detail:</label><input  type="text" name="bookdetail"/></br>
            <label>Author:</label><input type="text" name="bookaudor"/></br>
            <label>Published in:</label><input type="text" name="bookpub"/></br>
            
            <label>Price:</label><input  type="number" name="bookprice"/></br>
            <label>Quantity:</label><input type="number" name="bookquantity"/></br>
            <label>Book Photo</label><input  type="file" name="bookphoto"/></br>
            </br>
   
            <input type="submit" value="SUBMIT"/>
            </br>
            </br>

            </form>
            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="addperson" class="innerright portion" style="display:none">
            <Button class="bluebtn" >ADD STUDENT/TEACHER</Button>
            <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
            <label>Name:</label><input type="text" name="addname"/>
            </br>
            <label>Pasword:</label><input type="pasword" name="addpass"/>
            </br>
            <label>Email:</label><input  type="email" name="addemail"/></br>
            <label for="typw">Choose type:</label>
            <select name="type" >
                <option value="student">student</option>
                <option value="teacher">teacher</option>
            </select>
            </br>
            </br>
            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="studentrecord" class="innerright portion" style="display:none">
            <Button class="bluebtn" >STUDENT RECORD</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'> Name</th><th>Email</th><th>Type</th><th>delete</th></tr>";
            foreach($recordset as $row){
              $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                 $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
                $table.="</tr>";
               // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="issuebookreport" class="innerright portion" style="display:none">
            <Button class="bluebtn" >ISSUED BOOKS RECORD</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

<!--             

issue book -->
            <div class="rightinnerdiv">   
            <div id="issuebook" class="innerright portion" style="display:none">
            <Button class="bluebtn" >ISSUE BOOK</Button>
            <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
        </br>
            <label for="book">Choose Book:</label>
            <select name="book" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();
            foreach($recordset as $row){

                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }            
            ?>
            </select>

            <label for="Select Student">:</label>
            <select name="userselect" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select>
<br>
            Days<input type="number" name="days"/>
            </br>

        
            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
            
            <Button class="bluebtn" >BOOK DETAIL</Button>
</br>
<?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

                $bookid= $row[0];
               $bookimg= $row[1];
               $bookname= $row[2];
               $bookdetail= $row[3];
               $bookauthour= $row[4];
               $bookpub= $row[5];
              
               $bookprice= $row[7];
               $bookquantity= $row[8];
               $bookava= $row[9];
               $bookrent= $row[10];

            }            
?>

           
            <p style="color:black"><u>BOOK NAME:</u> &nbsp&nbsp<?php echo $bookname ?></p>
            <p style="color:black"><u>BOOK DETAIL:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
            <p style="color:black"><u>BOOK AUTHOR:</u> &nbsp&nbsp<?php echo $bookauthour ?></p>
            <p style="color:black"><u>BOOK PUBLISHED IN :</u> &nbsp&nbsp<?php echo $bookpub ?></p>
            <p style="color:black"><u>BOOK PRICE:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
            <p style="color:black"><u>BOOKS PRICE:</u> &nbsp&nbsp<?php echo $bookava ?></p>
            <p style="color:black"><u>BOOKS ISSUED:</u> &nbsp&nbsp<?php echo $bookrent ?></p>
        </br>
            <img width='150px' height='150px' style='border:1px solid #333333; float:centre;margin-left:20px' src="uploads/<?php echo $bookimg?> "/>
            </br>

            </div>
            </div>



            <div class="rightinnerdiv">   
            <div id="bookreport" class="innerright portion" style="display:none">
            <Button class="bluebtn" >BOOK RECORD</Button>
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbook();
            $recordset=$u->getbook();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Issued</th></th><th>View</th><th>delete</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td>$row[10]</td>";
                $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'>View Book</a></td>";
                $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'> Delete </a></td>";
                $table.="</tr>";
              //   $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>


            </div>
            </div>



        </div>
        </div>
        

     
        <script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }
        </script>
        </div>
    </body>
</html>