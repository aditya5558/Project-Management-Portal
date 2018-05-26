<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script language="javascript" src="calendar.js"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
   <body style="background-color:powderblue;">
       <div id="container" style="width:100%;">
  <div id="left" style="float:left; width:50%;">
          <form action="somewhere.php" method="post">
<?php
//get class into the page
require_once('classes/tc_calendar.php');






echo '<br>';



?>
</form>
        <b>SELECT STATUS</b>
       <form name="output" action="output.php">
  <input type="radio" name="status" value=".*"checked> ALL<br>
  <input type="radio" name="status" value="Completed"> COMPLETED<br>
  <input type="radio" name="status" value="Ongoing"> ONGOING <br><br><br>

 <?php
       $con = mysqli_connect("localhost", "phpuser", "phpuserpw");
  if (!$con) {
     exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
  }
  mysqli_set_charset($con, 'utf-8');
  mysqli_select_db($con, "management");


   $result=mysqli_query($con, "SELECT ProjTitle FROM managedata ");

   echo '<b>SELECT PROJECT TITLE   </b>';
echo '<select name="projtitle">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['ProjTitle'].'">'.$rs['ProjTitle'].'</option>';

}

echo '</select>';

$result=mysqli_query($con, "SELECT DISTINCT Sancorderno FROM managedata ");

   echo '<br><br><b>SELECT SANCTION ORDER NUMBER   </b>';
echo '<select name="sancorderno">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['Sancorderno'].'">'.$rs['Sancorderno'].'</option>';

}

echo '</select>';

 echo '<br><br><b>SELECT DEPARTMENT   </b>';
 $result=mysqli_query($con, "SELECT DISTINCT Dept FROM managedata ");
echo '<select name="dept">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['Dept'].'">'.$rs['Dept'].'</option>';

}

echo '</select>';
echo '<br><br><b>SELECT PRINCIPAL INVESTIGATOR   </b>';

  $result=mysqli_query($con, "SELECT DISTINCT PrincInv FROM managedata ");
echo '<select name="princinv">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['PrincInv'].'">'.$rs['PrincInv'].'</option>';

}

echo '</select>';

echo '<br><br><b>SELECT CO-COARDINATOR   </b>';
$result=mysqli_query($con, "SELECT DISTINCT CoCord FROM managedata ");
echo '<select name="cocord">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['CoCord'].'">'.$rs['CoCord'].'</option>';

}

echo '</select>';

echo '<br><br><b>SELECT SUB AGENCY   </b>';
$result=mysqli_query($con, "SELECT DISTINCT Subagency FROM managedata ");
echo '<select name="subagency">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['Subagency'].'">'.$rs['Subagency'].'</option>';

}



echo '</select>';

echo '<br><br><b>SELECT DURATION   </b>';
$result=mysqli_query($con, "SELECT DISTINCT Duration FROM managedata ");
echo '<select name="duration">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['Duration'].'">'.$rs['Duration'].'</option>';

}

echo '</select>';
echo '<br><br><b>SELECT RANGE FOR DATE OF SANCTION   </b><br>';
echo 'FROM  ';
$myCalendar = new tc_calendar("date1", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(02, 01, 1961);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo ' ';

$myCalendar = new tc_calendar("date2", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(30, 12, 2016);
$myCalendar->setYearInterval(1960, 2026);
$myCalendar->dateAllow('1960-01-01', '2026-12-31');
echo 'TO  ';

$myCalendar->writeScript();

echo '<br><br><b>SELECT RANGE FOR START DATE OF PROJECT   </b><br>';
echo 'FROM  ';
$myCalendar = new tc_calendar("date3", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(02, 01, 1961);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo ' ';

$myCalendar = new tc_calendar("date4", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(30, 12, 2016);
$myCalendar->setYearInterval(1960, 2026);
$myCalendar->dateAllow('1960-01-01', '2026-12-31');
echo 'TO  ';

$myCalendar->writeScript();

echo '<br><br><b>SELECT RANGE FOR END DATE OF PROJECT  </b><br>';
echo 'FROM  ';
$myCalendar = new tc_calendar("date5", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(02, 01, 1961);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo ' ';

$myCalendar = new tc_calendar("date6", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(30, 12, 2026);
$myCalendar->setYearInterval(1960, 2026);
$myCalendar->dateAllow('1960-01-01', '2026-12-31');
echo 'TO  ';

$myCalendar->writeScript();
?>
  </div>


<div id="right" style="float:right; width:50%;">
    <b>SELECT OUTPUT PARAMETERS</b><br><br>
     <?php
$resultt=mysqli_query($con, "SELECT * FROM managedata ");
$fields_num = mysqli_num_fields($resultt);

for($i=0; $i<$fields_num-1; $i++)
{
    $field = mysqli_fetch_field($resultt);
     echo "<input required type=\"checkbox\" name={$i} checked>{$field->name} <br>";

}

//
//$result3=mysqli_query($con, "SELECT * FROM manageint ");
//
//$row = mysqli_fetch_row($result3);
//$val=$row[0];
//
//
// echo '<br><br><b> INTEREST RATE  </b><br>';
//  echo "<input required type = \"text\" name = \"Interest\" value = $val />
//
//  <br><br>";
?>
  <input type="submit" value="Go" /><!--
--></div>
       </div>
</form>
    </body>
</html>
