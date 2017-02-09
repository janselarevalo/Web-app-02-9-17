<?php
  require("anyco_ui.inc");
  $conn = oci_connect('hr','hr','localhost/xe');
  ui_print_header('Login Page for Anyco');
?>
<form method="post" action="#">

  <b>Employees<b><br><br />
  <label>Username: </label><input type="text" name="username"/> <br>
  <label>Password: </label><input type="password" name="password"/> <br>
  <input type="submit" name="submit" value="Login"/>
</form>


<?php
  if(isset($_POST['submit'])){
  
    $username = addslashes($_POST['username']);
    $password =addslashes ($_POST['password']);
    $sel_c = "select * from EMPLOYEES where EMAIL ='".$password."' AND EMPLOYEE_ID='".$username."'";
    $run_c = oci_parse($conn, $sel_c);
    $exec = oci_execute($run_c);
    $arr = oci_fetch_array($run_c);
    $check_num =oci_num_rows($run_c);
    
    while(($row=oci_fetch_array($run_c, OCI_ASSOC + OCI_RETURN_NULLS))!=False){
    
  }
    if($check_num == 0){
      echo "<script>alert('password or email is incorrect!')</script>";
    }else{
      header("Location: anyco.php");
    }
    
    
  }



?>