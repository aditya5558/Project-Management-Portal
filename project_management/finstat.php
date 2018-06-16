<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script language="javascript" src="calendar.js"></script>
        <title></title>
    <style>
        input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: lightblue;
  color: black;
  border: none;
  text-align: center;
  font-size:15px;
  padding: 12px;
 
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
input[type=text]:focus {
    border: 3px solid #555;
}
select {
    
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
</style>

<?php
//get class into the page
require_once('classes/tc_calendar.php');
  
?>

    </head>
    <body>
            <center><b> <font size="10" >ACCOUNT STATEMENT</font></b></center><br><br><br><br><br>
        <form name="finstat" action="finstat_out_modified.php">
            
            
        <?php
        
       $con = mysqli_connect("localhost", "phpuser", "phpuserpw");
  if (!$con) {
     exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
  }
  mysqli_set_charset($con, 'utf-8');
  mysqli_select_db($con, "management");
 

  

$result=mysqli_query($con, "SELECT * FROM managedata ");
   
echo '<br><br><b>SELECT PROJECT  </b><br><br>';
echo '<select name="sancorderno">';


 
while($rs=mysqli_fetch_array($result)){
   
      echo '<option value="'.$rs['Sancorderno'].'">'.$rs['PrincInv']."-".$rs['ProjTitle'].'</option>';
  
}
echo '</select><br><br>';

// echo '<br><br><b>SELECT START DATE OF STATEMENT </b><br><br>';
// $myCalendar = new tc_calendar("date1", true);
// $myCalendar->setIcon("images/iconCalendar.gif");
// //$myCalendar->setDate(02, 01, 1961);
// $myCalendar->setYearInterval(1960, 2026);
//   $myCalendar->dateAllow('1961-01-01', '2056-12-31');
// $myCalendar->writeScript();

echo '<br><br><b>SELECT END DATE OF STATEMENT </b><br><br>';
$myCalendar = new tc_calendar("date2", true);
$myCalendar->setIcon("images/iconCalendar.gif");
//$myCalendar->setDate(02, 01, 1961);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2056-12-31');
$myCalendar->writeScript();

echo '<br><br>';
//
//echo '<br><br><b>SELECT YEAR   </b>';
//
//echo '<select name="year">';
//
//for($i=1960;$i<=2050;++$i)
//{
//      echo '<option value="'.$i.'">'.$i.'</option>';
//  
//}
// echo '</select><br><br>'; 
 
        ?>
               <button class="button" style="vertical-align:middle"><span>GO   </span></button>
              
              
        </form>
        

    </body>
</html>
