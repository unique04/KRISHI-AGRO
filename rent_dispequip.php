<?php
$con= mysqli_connect('localhost','sickwiz','2409','SIH');
if(isset($_POST["submit"]))
{
    
    if(empty($_SESSION))
       session_start(); 
      
    $equi=$_POST['equip'];
    $kc=$_SESSION['kcc'];   
    $q1="SELECT * FROM $equi WHERE KCC!='$kc'";
    $q=mysqli_query($con,$q1);
    

    if(mysqli_num_rows($q)>0)
    {
        
        $name=array();
        $a=array();
        while($p=mysqli_fetch_assoc($q))
        {
            array_push($a,$p['AVAILABLE']);
        $y=$p['KCC'];
        $q2="SELECT NAME FROM FARMER WHERE KCC='$y'";
        $qq=mysqli_query($con,$q2);
        while($pp=mysqli_fetch_assoc($qq))
        {
            array_push($name,$pp['NAME']);
        }
        }
        



    }
$length=count($a);    
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_SESSION['name'] ?></title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
#logo
{
    border-radius:50px;
}
</style>
</head>
<body>
<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
               <a class="navbar-brand" >
                   <img id=logo src="img/agroLogo.png" height="100" width="100" />
                </a>

            </div>

        </div>
    </div>
        <section class="menu-section">
        <div class="container">
            <div class="row ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                       
                        <li><a href="add_equipment.php"><b>ADD EQUIPMENT</b></a></li>
                            <li><a href="rent_list.php"><b>SEE RENTED</b></a></li>
                            <li><a href=""><b>RENT EQIPMENTS</b></a></li>
                           </ul>
                           <div id='wel'>WELCOME <?php echo $_SESSION['name']; ?></div>
                           </div>
        </div>
    </section>

    <center><font size= "6"><b><span> THE LIST OF PEOPLE YOU RENTED THE EQUIPMENT  </span></font size></b></center>
   <hr>
    <table align=center border=5px>
    <tr id="head">
    <td> NAME </td>
    <td> NO OF AVAILABLE </td>
    </tr>
    <tr>
    <td> 
    <?php 
    for($x=0;$x<$length;$x++)
    {
        echo $name[$x]."<br> <hr>";
    }
    ?>
      </td>
      <td> 
    <?php 
    for($x=0;$x<$length;$x++)
    {
        echo $a[$x]."<br><hr>";
    }
    ?>
      </td>
      <td> 
</td>
    </body>
    </html>
 