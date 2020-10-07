<?php 
include_once 'header.php';
include_once 'functions.php';
session_start(); 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_POST["user_name"];
    $password=$_POST["password"];
    $login=logIn($name,$password);
    $record_exist_row= mysqli_num_rows($login);
    if($record_exist_row>0)
    {
     $_SESSION["login_user"]=mysqli_fetch_assoc($login);   
     header("location:pizzahut_admin.php");   
    }
 else {
       $html="<small class='text-danger'>your username or password is incorrect!</small;>";
    }
	
}

?>

 



  <div  class="row">
      
    <div class="col s12 z-depth-4 card-panel">
       
        <form method="post" action="login.php" class="login-form" id="form">
        <div class="row">
          <div class="input-field col s12 center">
            <p class="center login-form-text">Login for Pizzahut System</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="user_name"  type="text">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="password" id="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
            <button type="submit" class="btn waves-effect waves-light col s12">Login</button>
          </div>
          <?php if(isset($html)) {echo $html;}?>
		  		<div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="#">Register Now!</a></p>
          </div>         
        </div>
          </form>
        </div>
    </div>

      
        
    
  

<?php include_once 'footer.php';

