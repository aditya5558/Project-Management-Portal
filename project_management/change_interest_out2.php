<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <style>
.button {
    background-color: #555555; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
 
    transition-duration: 0.4s;
    cursor: pointer;
}
    </style>
    </head>
    <body>
        <?php
      $con = mysqli_connect("localhost", "phpuser", "phpuserpw");
  if (!$con) {
     exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
  }
  mysqli_set_charset($con, 'utf-8');
  mysqli_select_db($con, "management");
  $gsancorderno = $_COOKIE['gid'];
//   echo $gsancorderno;
//   echo '<br>';
//   echo $_GET['num_rows'];
//   echo $_COOKIE['num_rows'];
  for ($i=0;$i<$_GET['num_rows'];++$i)

  {          
        // echo "in loop!";
  			  $year = $_GET["y".$i];
  			  $interest = $_GET["i".$i];
              $q6="UPDATE `interest` SET `interest`='$interest' WHERE sanc_key REGEXP '$gsancorderno' AND year = $year ";


                if(  ! $resultt = mysqli_query($con,$q6))
                     {
                         echo"ERROR" .mysqli_error($con);
                     }
                     else
                     {
                         echo"SUCCESSFULLY UPDATED GENERATED INTERESTS <br><br>";
                     }
            

   
         }
  
        ?>
        
          <form name="back" action="index.php">
                      <button class="button button5">Back</button>
        </form>
    </body>
</html>
