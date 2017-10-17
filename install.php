<?php 

// if (!isset($_COOKIE['install_step'])) {
// 	setcookie("install_step", '1', time() + 60*60*24*100, "/");	
// }else{

if (isset($_POST['installbtn'])) {
	 ini_set('max_execution_time',1000);
function getReference(&$var)
{
    if(is_object($var))
        $var->___uniqid = uniqid();
    else
        $var = serialize($var);
    $name = getReference_traverse($var,$GLOBALS);
    if(is_object($var))
        unset($var->___uniqid);
    else
        $var = unserialize($var);
    return "\${$name}";    
}
function getReference_traverse(&$var,$arr)
{
    if($name = array_search($var,$arr,true))
        return "{$name}";
    foreach($arr as $key=>$value)
        if(is_object($value))
            if($name = getReference_traverse($var,get_object_vars($value)))
                return "{$key}->{$name}";
}

$dsn = 'mysql:host='.$_POST['db_host'].';dbname='.$_POST['db_name'];
$user = $_POST['db_user'];
$password = $_POST['db_pass'];

	$txt = '<?php
	$username ="'.$_POST['db_user'].'";
	$dsn="mysql:host='.$_POST['db_host'].';dbname='.$_POST['db_name'].'";
	$password="'.$_POST['db_pass'].'";
	$GLOBALS["url"] = "'.$_POST['site_url'].'"; //Site URL
	$GLOBALS["sitename"] = "'.$_POST['site_name'].'";
	$GLOBALS["email"] = "'.$_POST['email'].'";
	$GLOBALS["email_password"] = "'.$_POST['email_pass'].'";
	?>';
	$myfile = fopen("resource/config.php", "w") or die("Unable to open file!");	
	fwrite($myfile, $txt);		
	fclose($myfile);

	$db = new PDO($dsn, $user, $password);
	$sql = file_get_contents('db.sql');
	$qr = $db->exec($sql);
	echo "<script>
	     swal({
			  title: 'Installation Success!',
			  text: '<Login> Email: admin@site.com password: password123',
			  type: 'warning',			  
			  confirmButtonText: 'Go To Site'
			}).then(function () {
			  window.location.href='index.php';
			});
	</script>";

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>INTALL</title>
	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.min.js"></script>      
</head>
<body class="teal">
	<div class="container">
		<div class="row">
		    <div class="card">
		    	<div class="card-title">
		    		<h4>Install Woodland Away <small>Dev: Safayat Jamil</small></h4>
		    		required*: max_execution_time = 1000 <br>
		    	</div>
		    	<div class="card-content">
		    		<form class="col s12" action="" method="post">
		      <div class="row">
		        <div class="input-field col s6">
		          <input  type="text" required name="site_url" placeholder="http://something.com">
		          <label>SiteURL: </label>
		        </div>
		        <div class="input-field col s6">
		          <input  id="first_name" type="text" required name="site_name">
		          <label>Site Name: </label>
		        </div>
		        <div class="input-field col s6">
		          <input  type="text" required name="db_host">
		          <label>Database Host:</label>
		        </div>
		        <div class="input-field col s6">
		          <input  type="text" name="db_name">
		          <label>Database Name:</label>
		        </div>
		        <div class="input-field col s6">
		          <input  type="text" name="db_user">
		          <label>Database Username:</label>
		        </div>
		        <div class="input-field col s6">
		          <input  type="password" name="db_pass">
		          <label>Database Password:</label>
		        </div>
		        <div class="input-field col s6">
		          <input  type="text" required name="email">
		          <label>Email (gmail Only):</label>
		        </div>
		        <div class="input-field col s6">
		          <input  type="password" required name="email_pass">
		          <label>Email Password:</label>
		        </div>
		        <div class="input-field col s6">
		          <button name='installbtn' type="submit" class="waves-effect waves-light btn btn-large">Begin Installation</button>
		        </div>
		      </div>		      		      
		    </form>
		    	&nbsp;
		    	</div>

		    </div>
		  </div>		
	</div>
</body>
</html>



<?php 
// } 
?>