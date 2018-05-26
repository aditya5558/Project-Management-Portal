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

            table {
    border-collapse: collapse;
    width: 100%;
         table-layout: fixed;
}

th, td {
    text-align: left;
    padding: 8px;
     border-bottom: 1px solid #ddd;

}
tr:hover{background-color:#f5f5f5}
tr:nth-child(even){background-color: #f2f2f2}
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
    <center><b> <font size="10" >ALLOCATE UNALLOCATED FUNDS</font></b></center><br><br><br><br><br>
        <?php
        require_once('classes/tc_calendar.php');
            $arr=array('April','May','June','July','August','September','October ','November','December','January','February' ,'March');
        $con = mysqli_connect("localhost", "phpuser", "phpuserpw");
  if (!$con) {
     exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
  }
  mysqli_set_charset($con, 'utf-8');
  mysqli_select_db($con, "management");

  $gsancorderno=$_GET["sancorderno"];
  setcookie('gsanc', $gsancorderno);
 // $gyear=$_GET["year"];

  $q1="SELECT * FROM `managedata` WHERE Sancorderno REGEXP '$gsancorderno'";
  $result= mysqli_query($con, $q1);
    $q1="SELECT * FROM `managedata` WHERE Sancorderno REGEXP '$gsancorderno'";
  $result= mysqli_query($con, $q1);

  $rs=mysqli_fetch_array($result);
  $title=$rs['ProjTitle'];
  $pinv=$rs['PrincInv'];
  //$edate=$rs['EndDate'];
  echo "<form action=\"allocate3.php \" >";
  echo "<table>";
  echo "<tr><td><b>PROJECT SANCTION ORDER NUMBER</b> </td> <td name=\"sancorderno\">$gsancorderno </td></tr>";
  echo "<tr><td><b>PROJECT TITLE </b></td> <td>$title </td></tr>";
  echo "<tr><td><b>PRINCIPLE INVESTIGATOR</b> </td> <td>$pinv </td></tr>";

  $q2 = "SELECT * FROM 	`unallocated` WHERE sanc_key REGEXP '$gsancorderno'";
  $result= mysqli_query($con, $q2);

  if(mysqli_num_rows($result)==0)
  {
  	       echo "<center><b><font size=\"5\">NO UNALLOCATED FUNDS! </font></b></center><br><br><br>";

  }

  else

  {

		  $rs=mysqli_fetch_array($result);
		  $uamount = $rs[1];
		   echo "<tr><td><b>UNALLOCATED</b></td> <td>$uamount </td></tr>";
		   echo "</table>";

		echo '<br><br><b>SELECT DATE OF ALLOCATION  </b><br><br>';

		$myCalendar = new tc_calendar("date", true);
		$myCalendar->setIcon("images/iconCalendar.gif");
		//$myCalendar->setDate(02, 01, 1961);
		$myCalendar->setYearInterval(1960, 2026);
		  $myCalendar->dateAllow('1961-01-01', '2056-12-31');
		$myCalendar->writeScript();
		echo ' ';

		 echo "<br><br><b> AMOUNT </b>  <br><br>";

		  echo "<input required type = \"number\" name = \"amount\" max = \"$uamount\"/>  

		 <br>";


		  echo '<br><br><b>SUB - HEAD </b><br>';
		echo '<select name="subhead">';


		 echo '<option value="MANPOWER/FELLOWSHIP">MANPOWER/FELLOWSHIP</option>';
		  echo '<option value="CONSUMABLE">CONSUMABLE</option>';
		  echo '<option value="TRAVEL">TRAVEL</option>';
		  echo '<option value="CONTINGENCY">CONTINGENCY</option>';
		  echo '<option value="EQUIPMENT">EQUIPMENT</option>';
		  echo '<option value="OVERHEAD">OVERHEAD</option>';
		  echo '<option value="PROCURED_SERVICES">PROCURED_SERVICES</option>';
		  echo '<option value="OTHER_COST">OTHER COST</option>';
		  echo '<option value="STIPEND">STIPEND</option>';
		  echo '<option value="OUTSOURCING OF FACILITIES">OUTSOURCING OF FACILITIES</option>';
		  echo '<option value="SOFTWARE/HARDWARE">SOFTWARE/HARDWARE</option>';
		   echo '<option value="TRAINING AND DEVELOPMENT">TRAINING AND DEVELOPMENT</option>';
		   echo '<option value="WORKSHOP, CONFERENCE AND SEMINAR">WORKSHOP, CONFERENCE AND SEMINAR</option>';
		    echo '<option value="DUTY_OF_IMPORT">DUTY OF IMPORT</option>';
		     echo '<option value="BOOKS">BOOKS</option>';
		      echo '<option value="REIMBURSEMENT_OF_RENT">REIMBURSEMENT OF RENT</option>';



		echo '</select>';

		echo '<br><br><b> MEMO </b><br>';

		 echo "<textarea name = \"memo\" cols=\"40\" rows=\"5\"/></textarea>

		 <br>";
	}

   ?>

    <button class="button" style="vertical-align:middle"><span>SUBMIT</span></button>
        </form>

   </body>
