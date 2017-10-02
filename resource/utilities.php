<?php
/*
*Everything required for form validation is stored here
*This codes are function sonly. These are called from 
* another part of the applications
*/


$GLOBALS['url'] = 'http://aryan.lh'; //Site URL
$GLOBALS['sitename'] = 'Aryan Dream Holidays';

//PHP mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once __DIR__.'/plugin.php';


//Checking Empty field, accepts an array for the data

function check_empty_fields($required_fields_array){ 
	//will contain form errors
	$form_errors = array();

	foreach ($required_fields_array as $field) {
        //if a field is empty or not set then
        if(!isset($_POST[$field]) || $_POST[$field] == null || $_POST == ''){
            //push it inside $form_errors
            $error = ''.$field.' is a required field';
            array_push($form_errors, $error);
        }
    }
	return $form_errors;
}

//checking the minimum legth, accepts an array. 
//['nameOfField' => minimumLegthInInteger]
// example : "username" => 4
function check_min_legth($fields_to_check_length){
	//errors
	$form_errors = array();
	foreach ($fields_to_check_length as $field => $minimumLegth) {
		//if trimmed string of the input is less than minimum legnth
		if(strlen(trim($_POST[$field])) < $minimumLegth){
			//push it into errors
			array_push($form_errors, ''.$field.' should be '.$minimumLegth.' characters long');
		}
	}
	return $form_errors;
}

/* checking email
*/
function check_email($poseted_data){
	//errors container
	$form_errors = array();
	//the key to check
	$key = 'email';

	//if the key exists in the posted data
	if(array_key_exists($key, $poseted_data)){
		//if its not empty
		if($_POST[$key] != null){
			//if the input is a valid email address
			if(filter_var($_POST[$key],FILTER_VALIDATE_EMAIL) === false){
				array_push($form_errors, ''.$key.' is not a valid Email address');
			}
		}
	}
	return $form_errors;
}

//used for showing errors

function show_errors($form_errors_array){
    $errors = "<p><ul style='color: red;'>";

    //loop through error array and display all items in a list
    foreach($form_errors_array as $the_error){
        $errors .= "<li> {$the_error} </li>";
    }
    $errors .= "</ul></p>";
    return $errors;
}

function flashmessage($message, $passFail ='fail'){
    if($passFail === 'pass'){
        $data = "<script type=\"text/javascript\">
                    swal({
                        title:\"Success!\",
                        text: \"".$message."\",
                        type:\"success\"       
                     });
                 </script>";
    }else{
        $data = "<script type=\"text/javascript\">
                    swal({
                        title:\"Error\",
                        text: \"".$message."\",
                        type:\"error\"       
                     });
                 </script>";;
    }
    return $data;
}
function redirectTo($location){
    header("location:".$location.".php");
}

function checkDuplicateEntries($table,$column_name,$val, $db){
    try{
        $sql="SELECT * FROM ".$table." WHERE ".$column_name."=:".$column_name;
        $statement = $db->prepare($sql);
        $statement->execute(array(":".$column_name => $val));
        if($row = $statement -> fetch()){
            return true;
        }
        return false;
    }catch (PDOException $ex){
        //handle exception
    }


}

function rememberMe($user_id){
    //Encrypting Cookie Data to base64
    $encryptedCookieData = base64_encode("lauJGckf92guy".$user_id);
    //sets the cookie to expire in 100 days
    setcookie("rememberUserCookie", $encryptedCookieData, time()+60*60*24*100, "/");
}

function isCookieValid($db){
    $isValid = false;

    //if a certain cookie exists then
    if (isset($_COOKIE['rememberUserCookie'])){
        //base64 Decoding to get the userID
        $decodedCookieData = base64_decode($_COOKIE['rememberUserCookie']);
        $cookieDataArray = explode("lauJGckf92guy",$decodedCookieData); // Breaks the string and adds it into an array
        $userID = $cookieDataArray[1];

        //check if the user id is tampered by matching it with database
        $sql = "SELECT * FROM users where id=:id";
        $statement = $db -> prepare($sql);
        $statement->execute(array(':id' => $userID));
        //if not tampered with then
        if ($row = $statement->fetch()){
            //its a valid cookie
            $isValid = true;

            //create user session Variable
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['fname'] =$row['fname'];
            $_SESSION['lname'] =$row['lname'];
            $_SESSION['verified'] = $row['verified'];

            $_SESSION['last_active'] = time();
            $_SESSION['fingerprint'] =md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
        }else{        //or else

        //its a invalid cookie
            $isValid = false;
        //Sign out user
            signout();
        }


    }
    //return validity status
    return $isValid;

}

function signout(){
    unset($_SESSION['id']);
    unset($_SESSION['username']);

    if(isset($_COOKIE['rememberUserCookie'])) {
        unset($_COOKIE['rememberUserCookie']);
        setcookie("rememberUserCookie", null, -1, "/");
    }

    session_destroy();
    session_regenerate_id(true);
    redirectTo('index');

}

function guard(){
    $isValid = true;
    $inactive = 60*30; //5 mins
    $fingerprint = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

    //if there is fingerprint in session(User is logged in and it does not matches the current fingerprint
    if (isset($_SESSION['fingerprint']) && $_SESSION['fingerprint'] != $fingerprint){
        $isValid= false;
        signout();
    }elseif (isset($_SESSION['last_active']) && time() - $_SESSION['last_active'] > $inactive){
        $isValid = false;
        signout();
    }else{
        $_SESSION['last_active'] = time();
    }
    return $isValid;
}


function lastInsertId($db, $table=''){
    if ($table == ''){
        return 'Error , No table name was Provided';
    }else{
        try {
            $sql = 'SELECT * FROM `'.$table.'` WHERE id=(SELECT MAX(id) FROM `'.$table.'`)';
            $statement = $db ->prepare($sql);
            $statement-> execute();
            while($row = $statement -> fetch()){
                return $row['id'];
            }

        } catch (PDOException $e) {
          echo $e->getMessage();   
        }
    }
}

function swal ($title='',$msg='', $type = 'warning',$redirect='none', $timer = null){
    $html = '<script type="text/javascript">
            swal({
                title:"'.$title.'",
                text: "'.$msg.'",
                ';
    $html .=   'type:"'.$type.'",
                ';
    $html .= ($timer != null )? 'showConfirmButton:false,timer: '.$timer.'}).then(function(){},function(dismiss){if (dismiss === "timer") {window.location.href="'.$redirect.'";}})': '})';
    $html .= ($redirect != 'none')? '.then(function() {window.location.href="'.$redirect.'";})':'';
    $html .= '</script>';


    echo $html;
}


function numRows($db,$table='items'){
    try {
        $sql= "SELECT COUNT(*) FROM ".$table;
        $statement = $db -> prepare($sql);
        $statement -> execute();

        $row = $statement->fetch();
        return $row["COUNT(*)"];
    } catch (PDOException $e) {
        //
    }
}

function pageClass($cls="home"){
    echo '<script>$("body").addClass("'.$cls.'")</script>';
}
function jsRedirect($cls="index.php"){
    echo '<script>window.location.href="'.$cls.'"</script>';
}

//Sends out a mail for activation of the
function sendActivationMail($email, $fname = 'Dear', $lname ='User'){
    //Get data
    $sender = 'test.safjammed@gmail.com';
    $message = "<h2>Welcome to ".$GLOBALS['sitename'].", ".$fname." ".$lname."</h2>
                <p>This mail is to let you know that an account was created in <a href='".$GLOBALS['url']."'>".$GLOBALS['sitename']."</a> and Your Details are below: </p>
                <br/>
                <table border='1'>
                 <thead>
                  <tr>
                     <th>Name</th>
                     <th>Email</th>
                  </tr>
                 </thead>                 
                 <tbody>
                  <tr>
                     <td>".$fname." ".$lname."</td>
                     <td>".$email."</td>
                  </tr>                  
                 </tbody>
                </table> <br><br>
                <h3>You need to activate before you can use this account. Please Click Below</h3><br>                 
                <a href='".$GLOBALS['url']."/activate.php?user=".base64_encode($email)."' style='padding: 10px; text-decoration:none; background:purple;color:white;'>Activate Account</a><br><br>
                <p>if that Doesnt work Copy and paste this to your browser: <br> ".$GLOBALS['url']."/activate.php?user=".base64_encode($email)."</p>
                <br><br>
                <h1>Thank You</h1>";


    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'test.safjammed@gmail.com';                 // SMTP username
        $mail->Password = '01197110308a';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($sender, $GLOBALS['sitename']);
        $mail->addAddress($email);     // Add a recipient
        $mail->addReplyTo($sender);

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $GLOBALS['sitename'].' Account Activation';
        $mail->Body    = $message;
        $mail->AltBody = 'This mail is to let you know that an account was created in '.$GLOBALS['url'].' and Your Copy the link to activate account:   '.$GLOBALS['url'].'/activate.php?user='.base64_encode($email);

        $mail->send();
//        Return 'Message has been sent';
    } catch (Exception $e) {
//        Return 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}


function activateUser($db, $email){
    try{
        $sql = "UPDATE users SET verified=1 WHERE email = :email";
        $statement = $db->prepare($sql);
        $statement->execute(array(':email'=>$email));
        if ($statement->rowCount() == 1){
            swal('Your account Has been activated','You can now Login', 'success','userLogin.php' );
        }
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sendForgotPassMail($email, $token){
    //Get data
    $sender = 'test.safjammed@gmail.com';
    $message = "<h2>Welcome to ".$GLOBALS['sitename']."</h2>
                <p>This mail is to let you know that an account was created in <a href='".$GLOBALS['url']."'>".$GLOBALS['sitename']."</a>. You have requested Password Reset for:</p>
                <br/>
                <table border='1'>
                 <thead>
                  <tr>
                     <th>Email</th>
                     <th>".$email."</th>
                  </tr>
                 </thead>
                 </table>                 
                  <br><br>
                <h3>Please Click Below to reset Your Password:</h3><br>                 
                <a href='".$GLOBALS['url']."/userlogin.php?forgotpass=1&email=".base64_encode($email)."&token=".$token."' style='padding: 10px; text-decoration:none; background:purple;color:white;'>Reset Password</a><br><br>
                <p>if that Doesnt work Copy and paste this to your browser addressbar: <br> ".$GLOBALS['url']."/userlogin.php?forgotpass=1&email=".base64_encode($email)."&token=".$token."</p>
                <br><br>
                <h1>Thank You</h1>";


    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'test.safjammed@gmail.com';                 // SMTP username
        $mail->Password = '01197110308a';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($sender, $GLOBALS['sitename']);
        $mail->addAddress($email);     // Add a recipient
        $mail->addReplyTo($sender);

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $GLOBALS['sitename'].' Password Reset';
        $mail->Body    = $message;
        $mail->AltBody = 'This mail is to let you know that an account was created in  '.$GLOBALS['sitename'].' and Your Copy the link to Reset password of the account:   '.$GLOBALS['url'].'/userlogin.php?forgotpass=1&email='.base64_encode($email).'&token='.$token;

        $mail->send();
//        Return 'Message has been sent';
    } catch (Exception $e) {
//        Return 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

function addToken($db,$email, $token){
    try {
        $sql = "INSERT INTO security_tokens (user_id,content) VALUES((SELECT id FROM users WHERE users.email = :email), :content)";
        $statement = $db->prepare($sql);
        $statement -> execute([':email' => $email, ':content' => $token]);
        if ($statement ->rowCount() ==1) {
            return true;
        }else{
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function matchToken($db,$email, $token){
    try {
        $sql = "SELECT count(*) FROM security_tokens WHERE user_id = (SELECT id FROM users WHERE users.email = :email) AND content = :content AND used=0";
        $statement = $db->prepare($sql);
        $statement -> execute([':email' => $email, ':content' => $token]);
        $i=0;
        while ($row = $statement->fetch()) {

            if ($row['count(*)'] >= 1 || $i >= 1) {
                return true;
            }else{
                return false;
            }
            $i++;
        }
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function useToken($db, $token){
    try {
        $sql = "UPDATE security_tokens SET used = 1 WHERE  content = :content";
        $statement = $db->prepare($sql);
        $statement -> execute([':content' => $token]);
        if ($statement ->rowCount() ==1) {
            return true;
        }else{
            return false;
        }
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function updatePassword($db,$hashed_password, $email){
 try {
        $sql = "UPDATE users SET password = :password WHERE email = :email";
        $statement = $db->prepare($sql);
        $statement -> execute([':password' => $hashed_password , ':email' => $email]);
        if ($statement ->rowCount() ==1) {
            return true;
        }else{
            return false;
        }
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>