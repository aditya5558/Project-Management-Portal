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
    <center><b> <font size="10" >ACCOUNT STATEMENT</font></b></center><br><br><br><br><br>
        <?php
            $arr=array('April','May','June','July','August','September','October ','November','December','January','February' ,'March');
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
  $title=$rs['ProjTitle'];
  $pinv=$rs['PrincInv'];
  //$edate=$rs['EndDate'];
  
  echo "<b><font size=\"5\">PROJECT SANCTION ORDER NUMBER : $gsancorderno </font></b></center><br><br><br>";
  echo "<b><font size=\"5\">PROJECT TITLE : $title </font></b></center><br><br><br>";
  echo "<b><font size=\"5\">PRINCIPLE INVESTIGATOR: $pinv </font></b></center><br><br><br>";
  //echo "<b><font size=\"5\">YEAR : $gyear </font></b></center><br><br><br>";
  
   $q2="SELECT * FROM `debit_head` WHERE debit_key = '$gsancorderno' ORDER BY `Date_of_debit` ASC";
   $result2= mysqli_query($con, $q2);
   $x= mysqli_num_rows($result2);
   $x=$x-1;
   //echo"$x";
    $q2_1="SELECT * FROM `debit_head` WHERE debit_key = '$gsancorderno' ORDER BY `Date_of_debit` ASC LIMIT $x,1";
    $result2_1= mysqli_query($con, $q2_1);
    if($x!=-1)
      {
        $rs2=mysqli_fetch_row($result2_1);
        $d1=$rs2[1];
      }
    else
      $d1=0;
    
    //echo"$rs2[1]<br><br>";
   
   $q3="SELECT * FROM `credit_head` WHERE credit_key = '$gsancorderno' ORDER BY `Date_of_credit` ASC";
   $result3= mysqli_query($con, $q3);
   $y= mysqli_num_rows($result3);
   if ($y==0)
   {
       echo "<center><b><font size=\"5\">NO GRANTS RECEIVED! </font></b></center><br><br><br>";

   }
   else
   {
      $q3_2="SELECT * FROM `credit_head` WHERE credit_key = '$gsancorderno' ORDER BY `Date_of_credit` ASC LIMIT 0,1";
      $result3_2= mysqli_query($con, $q3_2);

      $rs3=mysqli_fetch_row($result3_2);
      $sdate=$rs3[1];
      //echo $sdate;
      //echo "hi";
      $smonth=date("F", strtotime($sdate));
  $syear=date("Y", strtotime($sdate));

  //echo"start month $smonth, start year $syear<br><br>";

  $smindex=0;

  while($arr[$smindex]!=$smonth)
      $smindex++;

  if($smindex==9||$smindex==10||$smindex==11)
      $syear--;


  //echo"<br><br>smindex : $smindex  $arr[$smindex] <br><br>";


     
     $y=$y-1;
      $q3_1="SELECT * FROM `credit_head` WHERE credit_key = '$gsancorderno' ORDER BY `Date_of_credit` ASC LIMIT $y,1";
      $result3_1= mysqli_query($con, $q3_1);
      $rs3=mysqli_fetch_row($result3_1);
      $d2=$rs3[1];
     //echo"$rs3[1]<br><br>";
     if ($d1==0)
        $d1=$d2;

      if($d1>$d2)
      {   $edate=$d1;
      $emonth=date("F", strtotime($edate));
  $eyear=date("Y", strtotime($edate));}
      else
         {   $edate=$d2;
      $emonth=date("F", strtotime($edate));
  $eyear=date("Y", strtotime($edate));
         }
         //echo"<br><br> end date $edate<br>";
         $emindex=0;

  while($arr[$emindex]!=$emonth)
      $emindex++;

  //echo"<br><br>emindex : $emindex";

  if($emindex==9||$emindex==10||$emindex==11)
      $eyear--;
      
    //   $q4="SELECT * FROM `expenditure` WHERE sanc_key REGEXP '$gsancorderno' ORDER BY `year` ASC";
    //  $result4= mysqli_query($con, $q4);
    //  $a= mysqli_num_rows($result4);
    //  $a=$a-1;
    // // echo"$x";
      
    //  $q4_1="SELECT * FROM `expenditure` WHERE sanc_key REGEXP '$gsancorderno' ORDER BY `year` ASC LIMIT $a,1";
    //   $result4_1= mysqli_query($con, $q4_1);
    //   $rs4=mysqli_fetch_row($result4_1);
    //  // echo"$rs4[1]<br><br>";
     
    //  $q5="SELECT * FROM `grant_rec` WHERE sanc_key REGEXP '$gsancorderno' ORDER BY `year` ASC";
    //  $result5= mysqli_query($con, $q5);
    //  $b= mysqli_num_rows($result5);
     
    //  //echo"$b";
    //  $b=$b-1;
    //   $q5_1="SELECT * FROM `grant_rec` WHERE sanc_key REGEXP '$gsancorderno' ORDER BY `year` ASC LIMIT $b,1";
    //   $result5_1= mysqli_query($con, $q5_1);
    //   $rs5=mysqli_fetch_row($result5_1);
     // echo"$rs5[1]<br><br>";
     
     
  //   $x= mysqli_num_rows($result2);
  //   
  //   echo"$x";
  //   
    

   $bal=0;
   $mbal=0;
   
   $dhindex=0;
   $chindex=0;
   
   
   $syearr=$syear+1;
   //echo "$y";
     // echo "<b><center><font size=\"5\">FINANCIAL YEAR : $syear - $syearr </font></b></center><br><br><br>";
     
     
     while(!(($smindex==$emindex)&&($syear==$eyear)))
     {
          if($smindex==0 )
           echo "<b><center><font size=\"5\">FINANCIAL YEAR : $syear - $syearr </font></b></center><br><br><br>";

         //if($smindex==9)
            // echo"hi";
      echo"<center>----------------------------------------------------------------------------------------------------------------------------------</center><br>";
         echo "<b><font size=\"5\"> $arr[$smindex] </font></b><br>";
         if($smindex==0)
            echo "<b><font size=\"3\"> OPENING BALANCE : $bal </font></b><br>"; 
         echo "<b><font size=\"3\"> CREDIT HEADS </font></b><br>";
         $flag=0;
         label:
            // echo "chindex: $chindex <br>";
           $qry="SELECT * FROM `credit_head` WHERE credit_key = '$gsancorderno' ORDER BY `Date_of_credit` ASC LIMIT $chindex,1";
            $res= mysqli_query($con, $qry);
            $rs=mysqli_fetch_row($res);
            $ldate=$rs[1];
            $lmonth=date("F", strtotime($ldate));
            $lyear=date("Y", strtotime($ldate));
            
              if($flag==0)
            { echo "<table>   
            <tr>
      <th>Date</th>
      <th>Amount</th>
      <th>Memo</th>
      <th>SubHead</th>
    </tr>
            </table>";}
            
            if($lmonth==$arr[9]||$lmonth==$arr[10]||$lmonth==$arr[11])
      $lyear--;
           // echo "lmonth:$lmonth  lyear:$lyear<br><br>";
            // echo "smonth:$smonth  syear:$syear<br><br>";
             
            if($lmonth==$arr[$smindex]&& $lyear==$syear)
            {
               echo "<table>
    
    <tr>
      <td>$rs[1]</td>
      <td>$rs[2]</td>
      <td>$rs[3]</td>
       <td>$rs[4]</td>
    </tr>
    
  </table>";
            //echo "<br><br> ";
            ++$chindex;
            $flag=1;
            // echo "lmonthb : $lmonth <br> chindex : $chindex <br>";
            if($chindex<=$y)
            {//echo "$chindex";    
            goto label;
            }
            }
            if($flag==0)
            {   echo "<table>
    
    <tr>
      <td>---</td>
      <td>---</td>
      <td>---</td>
       <td>---</td>
    </tr>
    
            </table>";}
            echo "<br><br>";
  //--------------------------------------------------------------------------------------------------------------
            echo "<b><font size=\"3\"> GRANTS RECEIVED : ";
            //echo"HI";
            if($smindex==9||$smindex==10||$smindex==11)
            $qrye="Select * FROM grant_rec WHERE sanc_key = '$gsancorderno' AND month REGEXP '$arr[$smindex]' AND year REGEXP '$syearr'";
        else {
              $qrye="Select * FROM grant_rec WHERE sanc_key = '$gsancorderno' AND month REGEXP '$arr[$smindex]' AND year REGEXP '$syear'";
        }
        
            $resulte= mysqli_query($con, $qrye);
            $n1= mysqli_num_rows($resulte);
            if($n1==0)
                echo "0.0";
            else {
                $rse=mysqli_fetch_row($resulte);
                echo"$rse[1]";
                $bal+=$rse[1];
               
                
                  }
                  
                  echo"</font></b>";
            //---------------------------------------------------------------------------------------------------------------
            echo "<br><br><b><font size=\"3\"> DEBIT HEADS </font></b><br>";
         $flag2=0;
         label2:
             //echo"dhindex : $dhindex <br>";
             //echo "chindex: $chindex <br>";
           $qryd="SELECT * FROM `debit_head` WHERE debit_key = '$gsancorderno' ORDER BY `Date_of_debit`,`Amount` ASC LIMIT $dhindex,1";
            $resd= mysqli_query($con, $qryd);
            $rsd=mysqli_fetch_row($resd);
            $ldated=$rsd[1];
            $lmonthd=date("F", strtotime($ldated));
            $lyeard=date("Y", strtotime($ldated));
           
            if($lmonthd==$arr[9]||$lmonthd==$arr[10]||$lmonthd==$arr[11])
            $lyeard--;
            if($flag2==0)
            { echo "<table>   
            <tr>
      <th>Date</th>
      <th>Amount</th>
      <th>Memo</th>
      <th>SubHead</th>
    </tr>
            </table>";}
            
            // echo "fake $rsd[1] $rsd[2] $rsd[3] $rsd[4] <br><br> ";
            //echo "lmonthd:$lmonthd  lyeard:$lyeard<br><br>";
            // echo "smonth:$smonth  syear:$syear<br><br>";
             
            if($lmonthd==$arr[$smindex]&& $lyeard==$syear)
            {
              //echo "$lmonthd $lyeard $dhindex<br>";
               echo "<table>
    
    <tr>
      <td>$rsd[1]</td>
      <td>$rsd[2]</td>
      <td>$rsd[3]</td>
       <td>$rsd[4]</td>
    </tr>
    
  </table>";
              // echo "<br><br> ";
            //echo "$rsd[1] $rsd[2] $rsd[3] $rsd[4] <br><br> ";
            ++$dhindex;
            $flag2=1;
            // echo "lmonthb : $lmonth <br> chindex : $chindex <br>";
            if($dhindex<=$x)
            {//echo "$chindex";    
            goto label2;
            }
            }
            if($flag2==0)
            {   echo "<table>
    
    <tr>
      <td>---</td>
      <td>---</td>
      <td>---</td>
       <td>---</td>
    </tr>
    
            </table>";}
            echo "<br><br>";
            //--------------------------------------------------------------------------------------------------------
              echo "<b><font size=\"3\"> MONTHLY EXPENDITURE : ";
            //echo"HI";
              if($smindex==9||$smindex==10||$smindex==11)
            $qrye="Select * FROM expenditure WHERE sanc_key = '$gsancorderno' AND month REGEXP '$arr[$smindex]' AND year REGEXP '$syearr'";
              else
                        $qrye="Select * FROM expenditure WHERE sanc_key = '$gsancorderno' AND month REGEXP '$arr[$smindex]' AND year REGEXP '$syear'";
            $resulte= mysqli_query($con, $qrye);
            $n1= mysqli_num_rows($resulte);
            if($n1==0)
                echo "0.0";
            else {
                $rse=mysqli_fetch_row($resulte);
                echo"$rse[0]";
                $bal-=$rse[0];
                  }
                  
                  echo"</font></b><br><br>";
               //---------------------------------------------------------------------------------------------------
                  $mbal+=$bal;
                 // echo "mbal : $mbal<br>";
            echo "<b><font size=\"3\"> BALANCE  : $bal </font></b><br>";
            if($smindex==11)
            {
                $smindex=0;
                $syear++;
                $syearr++;
                
                $intrst=$mbal/12*0.04;
                $bal+=$intrst;
                $mbal=0;
                
                echo "<br><br><b><font size=\"3\"> INTEREST GENERATED : $intrst</font></b><br>";
                echo "<b><font size=\"3\"> FINAL YEAR BALANCE : $bal</font></b><br>";
                
                  //echo "<b><center><font size=\"5\">FINANCIAL YEAR : $syear - $syearr </font></b></center><br><br><br>";
            }
            
            else
            $smindex++;
            
            //echo "$smindex";
             echo "<br><br>";
           
         
      }
     
     
     ///////////////////////////////////
        echo"<center>----------------------------------------------------------------------------------------------------------------------------------</center><br>";
         echo "<b><font size=\"5\"> $arr[$smindex] </font></b><br>";
         echo "<b><br><font size=\"3\"> CREDIT HEADS </font></b><br>";
         $flag=0;
         labelx:
            // echo "chindex: $chindex <br>";
           $qry="SELECT * FROM `credit_head` WHERE credit_key = '$gsancorderno' ORDER BY `Date_of_credit` ASC LIMIT $chindex,1";
            $res= mysqli_query($con, $qry);
            $rs=mysqli_fetch_row($res);
            $ldate=$rs[1];
            $lmonth=date("F", strtotime($ldate));
            $lyear=date("Y", strtotime($ldate));
            
            if($lmonth==$arr[9]||$lmonth==$arr[10]||$lmonth==$arr[11])
      $lyear--;
           // echo "lmonth:$lmonth  lyear:$lyear<br><br>";
            // echo "smonth:$smonth  syear:$syear<br><br>";
             if($flag==0)
            { echo "<table>   
            <tr>
      <th>Date</th>
      <th>Amount</th>
      <th>Memo</th>
      <th>SubHead</th>
    </tr>
            </table>";}
            if($lmonth==$arr[$smindex]&& $lyear==$syear)
            {
               
           echo "<table>
    
    <tr>
      <td>$rs[1]</td>
      <td>$rs[2]</td>
      <td>$rs[3]</td>
       <td>$rs[4]</td>
    </tr>
    
  </table>";
            //echo "<br><br> ";
            ++$chindex;
            $flag=1;
            // echo "lmonthb : $lmonth <br> chindex : $chindex <br>";
            if($chindex<=$y)
            {//echo "$chindex";    
            goto labelx;
            }
            }
            if($flag==0)
            {   echo "<table>
    
    <tr>
      <td>---</td>
      <td>---</td>
      <td>---</td>
       <td>---</td>
    </tr>
    
            </table>";}
            echo "<br>";
            //--------------------------------------------------------------------------------------------------------------
            echo "<b><font size=\"3\"> GRANTS RECEIVED : ";
            //echo"HI";
            if($smindex==9||$smindex==10||$smindex==11)
            $qrye="Select * FROM grant_rec WHERE sanc_key = '$gsancorderno' AND month REGEXP '$arr[$smindex]' AND year REGEXP '$syearr'";
        else {
            $qrye="Select * FROM grant_rec WHERE sanc_key = '$gsancorderno' AND month REGEXP '$arr[$smindex]' AND year REGEXP '$syear'";
  }
            $resulte= mysqli_query($con, $qrye);
            $n1= mysqli_num_rows($resulte);
            if($n1==0)
                echo "0.0";
            else {
                $rse=mysqli_fetch_row($resulte);
                echo"$rse[1]";
                $bal+=$rse[1];
                
                  }
                  
                  echo"</font></b>";
                
                
            //---------------------------------------------------------------------------------------------------------------
            echo "<b><br><br><font size=\"3\"> DEBIT HEADS </font></b><br>";
         $flag2=0;
         labelx2:
             //echo "chindex: $chindex <br>";
           $qryd="SELECT * FROM `debit_head` WHERE debit_key = '$gsancorderno' ORDER BY `Date_of_debit` ASC LIMIT $dhindex,1";
            $resd= mysqli_query($con, $qryd);
            $rsd=mysqli_fetch_row($resd);
            $ldated=$rsd[1];
            $lmonthd=date("F", strtotime($ldated));
            $lyeard=date("Y", strtotime($ldated));
           
            if($flag2==0)
            { echo "<table>   
            <tr>
      <th>Date</th>
      <th>Amount</th>
      <th>Memo</th>
      <th>SubHead</th>
    </tr>
            </table>";}
            
            if($lmonthd==$arr[9]||$lmonthd==$arr[10]||$lmonthd==$arr[11])
            $lyeard--;
           // echo "lmonthd:$lmonthd  lyeard:$lyeard<br><br>";
            // echo "smonth:$smonth  syear:$syear<br><br>";
             
            if($lmonthd==$arr[$smindex]&& $lyeard==$syear)
            {
               
             echo "<table>
    
    <tr>
      <td>$rsd[1]</td>
      <td>$rsd[2]</td>
      <td>$rsd[3]</td>
       <td>$rsd[4]</td>
    </tr>
    
  </table>";
            ++$dhindex;
            $flag2=1;
            // echo "lmonthb : $lmonth <br> chindex : $chindex <br>";
            if($dhindex<=$x)
            {//echo "$chindex";    
            goto labelx2;
            }
            }
            if($flag2==0)
            {   echo "<table>
    
    <tr>
      <td>---</td>
      <td>---</td>
      <td>---</td>
       <td>---</td>
    </tr>
    
            </table>";}
             //--------------------------------------------------------------------------------------------------------
              echo "<b><font size=\"3\"> MONTHLY EXPENDITURE : ";
            //echo"HI";
              if($smindex==9||$smindex==10||$smindex==11)
            $qrye="Select * FROM expenditure WHERE sanc_key = '$gsancorderno' AND month REGEXP '$arr[$smindex]' AND year REGEXP '$syearr'";
        else {
            $qrye="Select * FROM expenditure WHERE sanc_key = '$gsancorderno' AND month REGEXP '$arr[$smindex]' AND year REGEXP '$syear'";
  }
            $resulte= mysqli_query($con, $qrye);
            $n1= mysqli_num_rows($resulte);
            if($n1==0)
                echo "0.0";
            else {
                $rse=mysqli_fetch_row($resulte);
                echo"$rse[0]";
                $bal-=$rse[0];
                
                  }
                  
                  echo"</font></b><br><br>";
                  //-----------------------------------------------------------------
                $mbal+=$bal;
              //  echo "mbal : $mbal<br>";
            echo "<b><font size=\"3\"> BALANCE  : $bal </font></b><br>";
             echo "<br><br>";
            if($smindex==11)
            {
                $smindex=0;
                $syear++;
                $syearr++;
                
                $intrst=$mbal/12*0.04;
                $bal+=$intrst;
                $mbal=0;
                echo "<br><br><b><font size=\"3\"> INTEREST GENERATED : $intrst</font></b><br>";
                echo "<b><font size=\"3\"> FINAL YEAR BALANCE : $bal</font></b><br>";
                
                  //echo "<b><center><font size=\"5\">FINANCIAL YEAR : $syear - $syearr </font></b></center><br><br><br>";
            }
            
            else
            $smindex++;
          
          }
         
       
   
        ?>
     <form name="back" action="index.php">
          <button class="button button5">Back</button>
        </form>
    </body>
</html>
