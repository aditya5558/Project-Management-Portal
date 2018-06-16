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
        
        // put your code here
         $gsanc = $_GET["projsancauth"];
        $gsubagency=$_GET["subagency"];
        $gaddsanc = $_GET["projsancadd"];
        $gprojtitle=$_GET["projtitle"];
        $gsancorderno=$_GET["sancorderno"];
        $gdept=$_GET["dept"];
        $gprincinv=$_GET["princinv"];
        $gcocord=$_GET["cocord"];
        $gcost=$_GET["cost"];
        $gdur=$_GET["duration"];
        //$gexp=$_GET["exp"];
        //$gint=$_GET["interest"];
        //$gdebit=$_GET["debithead"];
        $gstatus = $_GET["status"];
  
       
       

        $sancDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
       $fsancDate= date('Y-m-d', strtotime($sancDate));
       
        $startDate = isset($_REQUEST["date2"]) ? $_REQUEST["date2"] : "";
        $fstartDate= date('Y-m-d', strtotime($startDate));
        
        $endDate = isset($_REQUEST["date3"]) ? $_REQUEST["date3"] : "";
        $fendDate= date('Y-m-d', strtotime($endDate));
        
        $grantDate = isset($_REQUEST["date4"]) ? $_REQUEST["date4"] : "";
        $fgrantDate= date('Y-m-d', strtotime($grantDate));
       
        //$query= "Insert into managedata (ProjSancAuth,Subagency,AddressSancAuth,ProjTitle,Sancorderno,SancDate,Dept,PrincInv,CoCord,Cost,StartDate,EndDate,Dateofrec,Duration,Expenditure,Interest,DebitHead,Status) values( $gsanc,$gsubagency,$gaddsanc ,$gprojtitle,$gsancorderno,$fsancDate,$gdept,$gprincinv,$gcocord, $gcost,$fstartDate, $fendDate, $fgrantDate,$gdur,$gexp,$gint,$gdebit, $gstatus )";
      $result = mysqli_query($con,"SELECT * FROM managedata");

//echo"$num_rows";
               $query= "INSERT INTO `managedata` (`ProjSancAuth`,`Subagency`,`AddressSancAuth`,`ProjTitle`,`Sancorderno`,`SancDate`,`Dept`,`PrincInv`,`CoCord`,`Cost`,`StartDate`,`EndDate`,`Dateofrec`,`Duration`,`Status`) VALUES('$gsanc','$gsubagency','$gaddsanc' ,'$gprojtitle','$gsancorderno','$fsancDate','$gdept','$gprincinv','$gcocord', '$gcost','$fstartDate', '$fendDate', '$fgrantDate','$gdur','$gstatus' )";
 
if(! $result = mysqli_query($con,$query ))
{
    echo"ERROR" .mysqli_error($con);
}
else
{
    echo"SUCCESSFUL";
}
//        echo "$startDate, $endDate, $grantDate,$gdur,$gexp,$gint,$gdebit, $gstatus";
//        if ($con->mysqli_query($query) === TRUE) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $query . "<br>" . $con->error;
//}
//        $query1= "SELECT * FROM managedata";
//        $result1 = mysqli_query($con,$query1 );
        
        ?>
        
         <form name="back" action="index.php">
            <input type="submit" value="back" />
        </form>
    </body>
</html>
