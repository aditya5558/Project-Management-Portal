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
    </head>
    <body>
         <center><b> <font size="7" >EDIT DATA</font></b></center><br><br><br>
                  <form action="somewhere.php" method="post">
<?php
//get class into the page
require_once('classes/tc_calendar.php');






echo '<br>';


	  
?>
</form>   
        
        <form name="edit_out" action="edit_out_2.php">
        <?php
        // put your code here
        require_once('classes/tc_calendar.php');
   $con = mysqli_connect("localhost", "phpuser", "phpuserpw");
  if (!$con) {
     exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
  }
  mysqli_set_charset($con, 'utf-8');
  mysqli_select_db($con, "management");
  
  $gsancorderno=$_GET["sancorderno"];
 // $gyear=$_GET["year"];
  
  $q1="SELECT * FROM `managedata` WHERE Sancorderno = '$gsancorderno'";
  $result= mysqli_query($con, $q1);
  
  $rs=mysqli_fetch_array($result);
//  $title=$rs['ProjTitle'];
//  $pinv=$rs['PrincInv'];
  require_once('classes/tc_calendar.php');
  
   echo '<br><br><b> Sanction order number  </b><br>';
 echo "<input type = \"text\" name = \"sancorderno1\" value=\"$rs[Sancorderno]\" readonly />
 
 <br><br>";
  echo '<br><br><b> Project Sanc Authority  </b><br>';
 echo "<input type = \"text\" name = \"projsancauth\" / value=\"$rs[ProjSancAuth]\">
 
 <br>";
 
 echo '<br><br><b>  Sub Agency </b><br>';
 echo "<input type = \"text\" name = \"subagency\" value=\"$rs[Subagency]\"/>
 
 <br>";
 
 
  echo '<br><br><b> Project Sanc Authority Address </b><br>';
 echo "<input type = \"text\" name = \"projsancadd\" value=\"$rs[AddressSancAuth]\" />
 
 <br>";
 
 echo '<br><br><b> Project Title  </b><br>';
 echo "<input type = \"text\" name = \"projtitle\" value=\"$rs[ProjTitle]\" />
 
 <br>";
 
 
 
 
  echo '<br><br><b> Department  </b><br>';
 echo "<input type = \"text\" name = \"dept\" value=\"$rs[Dept]\" />
 
 <br>";
 
  echo '<br><br><b> Principal Investigator </b><br>';
 echo "<input type = \"text\" name = \"princinv\" value=\"$rs[PrincInv]\" />
 
 <br>";
 
 
  echo '<br><br><b> Co-coordinator </b><br>';
 echo "<input type = \"text\" name = \"cocord\" value=\"$rs[CoCord]\" />
 
 <br>";
//  
  echo '<br><br><b> Cost</b><br>';
 echo "<input type = \"text\" name = \"cost\" value=\"$rs[Cost]\" />
 
 <br>";
 
  echo '<br><br><b> Duration </b><br>';
 echo "<input type = \"text\" name = \"duration\" value=\"$rs[Duration]\" />
 
 <br>";
 
//  echo '<br><br><b> Expenditure </b>';
 //echo "<input type = \"text\" name = \"exp\" />
 
 //<br>";
// 
 // echo '<br><br><b> Interest </b>';
 //echo "<input type = \"text\" name = \"interest\" />
 
// <br>";
// 
 // echo '<br><br><b> Debit Head </b>';
 //echo "<input type = \"text\" name = \"debithead\" />
 
 //<br>";
//  echo '<br><br><b> Status </b>';
 //echo "<input type = \"text\" name = \"status\" />
//     
//
// 
// <br>";
 
  echo '<br><br><b>Status </b><br><br>';
echo '<select name="status">';

if($rs[Status]=="Ongoing")
{ echo '<option value="Ongoing">Ongoing</option>';
  echo '<option value="Completed">Completed</option>';}
  else
      {
  echo '<option value="Completed">Completed</option>';
   echo '<option value="Ongoing">Ongoing</option>';
      }
      


echo '</select>';
 echo '<br><br><b>SELECT DATE OF SANCTION OF PROJECT  </b><br>';
$fdate="$rs[SancDate]";
$d=date("d", strtotime($fdate));
$m=date("m", strtotime($fdate));
$y=date("Y", strtotime($fdate));
$myCalendar = new tc_calendar("date1", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate($d,$m,$y);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo ' ';
 
  
   echo '<br><br><b>SELECT START DATE OF PROJECT  </b><br>';
$fdate="$rs[StartDate]";
$d=date("d", strtotime($fdate));
$m=date("m", strtotime($fdate));
$y=date("Y", strtotime($fdate));
$myCalendar = new tc_calendar("date2", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate($d,$m,$y);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo ' ';
  
  
  echo '<br><br><b>SELECT END DATE OF PROJECT  </b><br>';
$fdate="$rs[EndDate]";
$d=date("d", strtotime($fdate));
$m=date("m", strtotime($fdate));
$y=date("Y", strtotime($fdate));

$myCalendar = new tc_calendar("date3", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate($d,$m,$y);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo ' ';

 echo '<br><br><b>SELECT  DATE OF GRANT RECEIVED </b><br>';
$fdate="$rs[Dateofrec]";
$d=date("d", strtotime($fdate));
$m=date("m", strtotime($fdate));
$y=date("Y", strtotime($fdate));

$myCalendar = new tc_calendar("date4", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate($d,$m,$y);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo ' ';

  
      
        
        ?>
            <br>
            <br>
              <button class="button" style="vertical-align:middle"><span>SUBMIT</span></button>
        </form>
    </body>
</html>
