
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 $con = mysqli_connect("localhost", "phpuser", "phpuserpw");
  if (!$con) {
     exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
  }
  mysqli_set_charset($con, 'utf-8');
  mysqli_select_db($con, "management");

        $gsanc = $_GET["projsancauth"];
        $gsubagency=$_GET["subagency"];
        $gaddsanc = $_GET["projsancadd"];
        $gprojtitle=$_GET["projtitle"];
        $gsancorderno=$_GET["sancorderno1"];
        $gdept=$_GET["dept"];
        $gprincinv=$_GET["princinv"];
        $gcocord=$_GET["cocord"];
        $gcost=$_GET["cost"];
        $gdur=$_GET["duration"];
        $gstatus=$_GET["status"];
        
      //  echo "$gsancorderno";
         $sancDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
       $fsancDate= date('Y-m-d', strtotime($sancDate));
       
      // echo"$sancDate";
       
        $startDate = isset($_REQUEST["date2"]) ? $_REQUEST["date2"] : "";
        $fstartDate= date('Y-m-d', strtotime($startDate));
        
        $endDate = isset($_REQUEST["date3"]) ? $_REQUEST["date3"] : "";
        $fendDate= date('Y-m-d', strtotime($endDate));
        
        $grantDate = isset($_REQUEST["date4"]) ? $_REQUEST["date4"] : "";
        $fgrantDate= date('Y-m-d', strtotime($grantDate));

$q3="UPDATE managedata SET `ProjSancAuth`='$gsanc',`Subagency`='$gsubagency',`AddressSancAuth`='$gaddsanc',`ProjTitle`='$gprojtitle',`SancDate`='$fsancDate',`Dept`='$gdept',`PrincInv`='$gprincinv',`CoCord`='$gcocord',`Cost`='$gcost',`Duration`='$gdur',`Status`='$gstatus',`StartDate`='$fstartDate',`EndDate`='$fendDate',`Dateofrec`='$fgrantDate' WHERE Sancorderno REGEXP '$gsancorderno'";
 $result= mysqli_query($con, $q3);

   if(! $result = mysqli_query($con,$q3 ))
                   {
                       echo"ERROR" .mysqli_error($con);
                   }
                   else
                   {
                       echo"SUCCESSFULLY MODIFIED RECORD <br><br>";
                   }
 
?>
        <form name="back" action="index.php">
            <input type="submit" value="back" />
        </form>

        </body>
</html>


