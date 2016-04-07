<?php 

error_reporting(0);
include('../conf/config.php'); 
  /////////////////////////
 // Registration Insert //
/////////////////////////
if (isset($_POST['submit_register'])) 
{ 
$email1 = $_POST['email1']; 
$email2 = $_POST['email2']; 
$pass1 = $_POST['pass1']; 
$pass2 = $_POST['pass2']; 

if($email1 == $email2 && $pass1 == $pass2) 
{ //All good 
$name = mysql_escape_string($_POST['name']);   
$pass1 = mysql_escape_string($_POST['pass1']); 
$pass2 = mysql_escape_string($_POST['pass2']); 
$pass1 = md5($pass1); 
$email1 = mysql_escape_string($_POST['email1']); 
$email2 = mysql_escape_string($_POST['email2']);
$IP = mysql_escape_string($_POST['IP']); 
$PORT = mysql_escape_string($_POST['PORT']);

//Check if email is taken 
$check = mysql_query("SELECT * FROM users WHERE email = '$email1'")or die(mysql_error()); 
if (mysql_num_rows($check)>=1) echo "Email already taken"; 

//Put everyting in DB 
else{ mysql_query("INSERT INTO `users` (`id`, `name`, `password`, `email`, `ip`, `port`) VALUES (NULL, '$name', '$pass1', '$email1', '$IP', '$PORT')") or die(mysql_error()); 
echo "Registration Successful"; 
} 
}
else{ 
echo "Sorry, your email's or your passwords do not match. <br />"; 
} 

  //////////////////
 // Login Insert //
//////////////////


} 
elseif(isset($_POST['submit_login']))
{ 
$email = mysql_escape_string($_POST['email']); 
$password = mysql_escape_string($_POST['password']); 
$password = md5($password); 

$check = mysql_query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'"); 
if(mysql_num_rows($check) >= 1)
{

//header("Location: http://192.168.0.4:8092");
header("Location: ../templates/cam.php");
exit();

}else{
$message1 = "Username and/or Password incorrect.\\nTry again.";
echo "<script type='text/javascript'>alert('$message1');</script>";
} 
}


  ////////////////////////////////
 // HTML Register+Insert Forms //
////////////////////////////////

else{

$form = ("
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang='en' class='no-js ie6 lt8'> <![endif]-->
<!--[if IE 7 ]>    <html lang='en' class='no-js ie7 lt8'> <![endif]-->
<!--[if IE 8 ]>    <html lang='en' class='no-js ie8 lt8'> <![endif]-->
<!--[if IE 9 ]>    <html lang='en' class='no-js ie9'> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang='en' class='no-js'> <!--<![endif]-->
    <head>
        <meta charset='UTF-8' />
        <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'> 
        <meta name='description' content='Login and Registration Form with HTML5 and CSS3' />
        <meta name='keywords' content='html5, css3, form, switch, animation, :target, pseudo-class' />
        <meta name='author' content='Codrops' />
        <link rel='shortcut icon' href='../favicon.ico'> 
        <link rel='stylesheet' type='text/css' href='../css/demo.css'/>
        <link rel='stylesheet' type='text/css' href='../css/style.css' />
		<link rel='stylesheet' type='text/css' href='../css/animate-custom.css' />
    </head>
    <body>
        <div class='container'>
            <!-- Codrops top bar -->
            <div class='codrops-top'>
                <a href=''>
                    <img src='../images/Picture1.png' style='width:80px;height:50px;'>
                </a>
                <span class='right'>
                    <a href=' http://tympanus.net/codrops/2012/03/27/login-and-registration-form-with-html5-and-css3/'>
                        <strong>ABOUT</strong>
                    </a>
                </span>
                <div class='clr'></div>
            </div><!--/ Codrops top bar -->
            <header>
                <h1>Login or Register Today With<span><br>Pi-Surveillance</span></h1>
            </header>
            <section>				
                <div id='container_demo' >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class='hiddenanchor' id='toregister'></a>
                    <a class='hiddenanchor' id='tologin'></a>
                    <div id='wrapper'>
                        <div id='login' class='animate form'>
                            <form  action='register.php' autocomplete='on' method='POST'> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for='email' class='e-mail' data-icon='u' > Your email </label>
                                    <input id='email' name='email' required='required' type='text' placeholder='mymail@mail.com'/>
                                </p>
                                <p> 
                                    <label for='password' class='youpasswd' data-icon='p'> Your password </label>
                                    <input id='password' name='password' required='required' type='password' placeholder='eg. X8df!90EO' /> 
                                </p>
                                <p class='keeplogin'> 
									<input type='checkbox' name='loginkeeping' id='loginkeeping' value='loginkeeping' /> 
									<label for='loginkeeping'>Keep me logged in</label>
								</p>
                                <p class='login button'> 
                                    <input type='submit' name='submit_login' value='Login' /> 
								</p>
                                <p class='change_link'>
									Not a member yet ?
									<a href='#toregister' class='to_register'>Join us</a>
								</p>
                            </form>
                        </div>

                        <div id='register' class='animate form'>
                            <form  action='register.php' autocomplete='on' method='POST'> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for='name' class='uname' data-icon='u'>Your username</label>
                                    <input id='name' name='name' required='required' type='text' placeholder='mysuperusername690' />
                                </p>
                                <p> 
                                    <label for='email1' class='youmail' data-icon='e' > Your email</label>
                                    <input id='email1' name='email1' required='required' type='email' placeholder='mysupermail@mail.com'/> 
									</p>
							    <p> 
                                    <label for='email2' class='youmail' data-icon='e' > Confirm email</label>
                                    <input id='email2' name='email2' required='required' type='email' placeholder=''/> 
									</p>	
                                <p> 
                                    <label for='password' class='youpasswd' data-icon='p'>Your password </label>
                                    <input id='password' name='pass1' required='required' type='password' placeholder='eg. X8df!90EO'/>
                                </p>
							    <p> 
                                    <label for='repassword' class='youpasswd' data-icon='p'>Confirm password </label>
                                    <input id='repassword' name='pass2' required='required' type='password' placeholder=''/>
                                </p>
								<p> 
                                    <label for='IP' class='yourIp' data-icon='p'>Your IP</label>
                                    <input id='IP' name='IP' required='required' type='text' placeholder='0.0.0.0'/>
                                </p>
								<p> 
                                    <label for='PORT' class='yourPort' data-icon='p'>Your port no.</label>
                                    <input id='PORT' name='PORT' required='required' type='text' placeholder=':00'/>
                                </p>
                                <p class='signin button'> 
									<input name='submit_register' type='submit' value='Sign up'/>  	 
								</p>
                                <p class='change_link'>  
									Already a member ?
									<a href='#tologin' class='to_register'> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
");



echo $form; 
} 
?>
