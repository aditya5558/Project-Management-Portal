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
        <style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #e7e7e7; 
  color: black;
  border: none;
  width:500px;
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
</style>
        <title>PROJECT MANAGEMENT</title>
    </head>
    <body style="background-color:#808080;"> 
        <center>
        <b> <font size="20" >PROJECT MANAGEMENT</font></b>
        <br><br><br><br><br><br>
        
       <form name="output" action="view_data.php">
         
      <button class="button" style="vertical-align:middle"><span>VIEW DATA </span></button>
  
  </form>

        <form name="add_data" action="add_data.php">
         
  <button class="button" style="vertical-align:middle"><span>ADD NEW  RECORDS   </span></button>
  </form>
        
         <form name="add_debithead" action="add_debithead.php">
          
   <button class="button" style="vertical-align:middle"><span>ADD DEBIT HEAD TO EXISTING PROJECTS  </span></button>
  </form>
        
         <form name="del_debithead" action="del_debithead.php">
          
  <button class="button" style="vertical-align:middle"><span>DELETE DEBIT HEAD FROM EXISTING PROJECTS   </span></button>
  </form>
        
         <form name="add_credithead" action="add_credithead.php">
          
  <button class="button" style="vertical-align:middle"><span>ADD CREDIT HEAD TO EXISTING PROJECTS   </span></button>
  </form>
        
        <form name="del_credithead" action="del_credithead.php">

    
  <button class="button" style="vertical-align:middle"><span>DELETE CREDIT HEAD FROM EXISTING PROJECTS  </span></button>
  </form>

  <form name="allocate" action="allocate.php">
     
  <button class="button" style="vertical-align:middle"><span>ALLOCATE UNALLOCATED FUNDS</span></button>
</form>
          

         <form name="finstat" action="finstat.php">
           
  <button class="button" style="vertical-align:middle"><span>FINANCIAL STATEMENT   </span></button>
</form>

<form action="change_interest.php">
           
  <button class="button" style="vertical-align:middle"><span>EDIT INTEREST GENERATED</span></button>
</form>
        
   <form name="edit_data" action="edit_data.php">
     
  <button class="button" style="vertical-align:middle"><span>EDIT RECORDS   </span></button>
</form>

  </center>

    </body>
</html>
