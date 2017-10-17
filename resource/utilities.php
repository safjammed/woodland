<?php
/*
*Everything required for form validation is stored here
*This codes are function sonly. These are called from 
* another part of the applications
*/


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

    //loop through error array and display all cabins in a list
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


function numRows($db,$table='cabins'){
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
    $sender = $GLOBALS['email'];
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
        $mail->Username = $GLOBALS['email'];                 // SMTP username
        $mail->Password = $GLOBALS['email_password'];                           // SMTP password
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

function printTypeOptions($db, $select = -1){
    $type = array(1 => 'Luxury', 2 => 'Contemporary', 3 => 'Original' );
    foreach ($type as $key => $value) {
        echo ($key == $select) ? '<option value="'.$key.'" selected>'.$value.'</option>' :'<option value="'.$key.'">'.$value.'</option>';
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
    $sender = $GLOBALS['email'];
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
        $mail->Username = $GLOBALS['email'];                 // SMTP username
        $mail->Password = $GLOBALS['email_password'];                           // SMTP password
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

//Gets all the cabins that has been added
function printAllItemsForAdmin($db){
    try{
        $sql ="SELECT * FROM cabins";
        $statement = $db -> prepare($sql);
        $statement -> execute();

        while ($row = $statement->fetch()) {
        echo '<div class="col-md-3"> 
        <div class="cabin-single card thumbnail"> 
        <img src="../assets/img/'.$row['feature_image'].'" class="img-responsive"> 
        <div class="container"> 
        <h3 id="thumbnail-label">'.$row['cabin_name'].'</span></h3> 
        <p><a href="cabin.php?edit='.$row['id'].'" class="btn btn-success" role="button">Edit</a> 
        <a href="cabin.php?del='.$row['id'].'" class="btn btn-default" role="button" onclick="return confirm(\'Are You sure?\')">Delete</a>
        </p> 
        </div> 
        </div> 
        </div>'; 
}
    }catch(PDOException $ex){
        //
    }
}


//Get all categories as options
function printPlacesOptions($db, $id=''){
    try {
        $sql= 'SELECT * FROM places';
        $statement = $db-> prepare($sql);
        $statement -> execute();
        $html="";       
        while ($row = $statement->fetch()) {
            if($id != ''){
                if ($id ==$row['id'] ){ // If the provided ID is same as row
                $html .= '<option value="'.$row['id'].'" selected> '.$row['cat_name'].'</option>';
            }else{ //If the provided ID is not same as the row ID
                $html .= '<option value="'.$row['id'].'"> '.$row['cat_name'].'</option>';
            }
            }else{ // If no ID was Given
                $html .= '<option value="'.$row['id'].'"> '.$row['cat_name'].'</option>';
            }
        }

        echo $html;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function addPriceFor($db, $cabin_id, $date_start, $date_end, $price, $regular = '0'){
  try {
    $statement= $db->prepare('INSERT INTO prices (cabin_id, date_start, date_end, price, regular) VALUES (:cabin_id, :date_start, :date_end, :price, :regular)');
    $statement->execute([':cabin_id' => $cabin_id , ':date_start' => $date_start, ':date_end' => $date_end, ':price' => $price,':regular' => $regular]);        
 } catch (PDOException $e) {
     echo 'addPriceFor'. $e->getMessage();
 }
}

function updatePriceFor($db, $cabin_id,$date_start, $date_end, $price,$regular){
    try {
    $statement= $db->prepare('UPDATE prices  SET price = :price ,date_start = :date_start, date_end = :date_end WHERE cabin_id = :cabin_id AND regular = :regular'); 
    $statement->execute([':cabin_id' => $cabin_id, ':price' => $price, ':date_start' => $date_start, ':date_end' => $date_end , ':regular'=> $regular]);
 } catch (PDOException $e) {
     echo 'updatePriceFor:'.$e->getMessage();
 }
}

function isCabinBooked($db, $cabin_id){
    try {
        $statement= $db->prepare('SELECT count(*) FROM cabin_booking WHERE cabin_id = :cabin_id');
        $statement ->execute([':cabin_id' => $cabin_id]);
        $row = $statement->fetch();
        if ($row['count(*)'] == 0) {
            return false;            
        }else{
            return true;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getRegularPrice($db, $cabin_id){
    try {
        $statement=$db->prepare('SELECT price FROM prices WHERE cabin_id = :cabin_id AND regular = 1');
        $statement->execute([':cabin_id' => $cabin_id]);
        $row =  $statement->fetch();
        return $row['price'];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getDateOf($db, $cabin_id, $type = 'start', $regular = '0'){
    try {
        $sql = 'SELECT date_'.$type.' FROM prices WHERE regular = :regular AND cabin_id=:cabin_id';
        $statement= $db->prepare($sql);
        $statement->execute([':regular' => $regular, ':cabin_id' => $cabin_id]);
        $row=$statement->fetch();
        return $row['date_'.$type];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function printCabinsOption($db, $select = '-1'){
    try {
        $statement = $db->prepare('SELECT * FROM cabins');
        $statement->execute();
        while ($row = $statement->fetch()) {
            $select = ($row['id'] == $select) ? 'selected': '';
            echo '<option '.$select.' value="'.$row['id'].'">'.$row['cabin_name'].'</option>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function getCabinNameOf($db, $cabin_id){
    try {
        $statement= $db->prepare('SELECT cabin_name FROM cabins WHERE id=:id');
        $statement->execute([':id'=>$cabin_id]);
        $row = $statement->fetch();
        return $row['cabin_name'];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function getPlaceName($db, $id){
    try {
        $statement=$db->prepare('SELECT cat_name FROM places WHERE id=:id');
        $statement->execute([':id' => $id ]);
        $row = $statement->fetch();
        return $row['cat_name'];
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
function getTypeName($db, $type_id){
    $type = array(1 => 'Luxury', 2 => 'Contemporary', 3 => 'Original' );
    foreach ($type as $key => $value) {
        if ($type_id == $key) {
            return $value;
        }else{
            return 'ERROR!!:'.$type_id.'=/='.$key;
        }
    }
    
}
function printPricetableOf($db, $cabin_id){
    try {
        $statement= $db->prepare('SELECT * FROM prices WHERE cabin_id=:cabin_id');
        $statement->execute([':cabin_id'=>$cabin_id]);
        while ($row=$statement->fetch()) {
            echo '<tr>
                        <td><b><span class="package-price">'.$row['price'].'</span> <span class="currencysign">USD</span></b><input type="hidden" class="package-base-price" value="'.$row['price'].'"/></td>
                        <td>'.$row['date_start'].'</td>
                        <td>'.$row['date_end'].'</td>
                        <td>2</td>
                        <td>2</td>
                      </tr>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function printCabinsForFront($db){
    try {
        $statement=$db->prepare('SELECT * FROM cabins, prices WHERE cabins.id = prices.cabin_id');
        $statement->execute();
        while ($row =$statement->fetch()) {      
?>
<div class="col s12 package-link" data-start-date='<?= $row['date_start']?>' data-end-date='<?= $row['date_end']?>' data-type='<?= $row['type']?>' data-area='<?= $row['cat_id']?>'>    
                    <div class="card zoom-out horizontal">
                      <div class="card-image">
                        
                        <img src="assets/img/<?= $row['feature_image']?>">
                        <p><?= getPlaceName($db, $row['cat_id']);?></p>
                      </div>
                      <div class="card-stacked">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s9">
                                    <h5><?= $row['cabin_name']?></h5>
                                  <ul class="collection">    
                                        <li class="collection-item">                                          
                                          <span class="title">Status</span>
                                          <p><b><?= (isCabinBooked($db,$row['cabin_id']) == true) ? 'BOOKED' : 'NOT BOOKED';?></b></p>
                                        </li>
                                        <li class="collection-item">                                          
                                          <span class="title">Cabin Type</span>
                                          <p><b><?= getTypeName($db, $row['type'])?></b></p>            
                                        </li>                                
                                    </ul>
                                  
                                </div>
                                <div class="col s3 border-left-dotted center-align">
                                  <h4 class="package-price"><?= $row['price'];?></h4><input type='hidden' class='package-base-price' value="<?= $row['price']?>"/>
                                  <p class="currencysign">USD</p>
                                  <p><?= ($row['regular'] == 1) ? 'Regular Price' : 'Special Price<br>'.$row['date_start'].'<br> to <br>'.$row['date_end'];?></p>                                 
                                </div>
                            </div>            
                        </div>
                        <div class="card-action bricked">                          
                        <a href="cabins.php?details=<?=$row['cabin_id']?>&p=<?= base64_encode($row['price'])?>&start=<?= $row['date_start']?>&end=<?= $row['date_end']?>" class="btn btn-large grey darken-4 right">Details</a>                               
                      </div>
                    </div>
                  </div>            
                </div>

<?php  
}
} catch (PDOException $e) {
        echo $e->getMessage();
    }

}





function sendBookingEmail($email, $fullname, $cabin_name, $days,$date_start,$date_end,$cabin_price){
    //Get data
    $sender = $GLOBALS['email'];
    $message = "<h2>Welcome to ".$GLOBALS['sitename']."</h2>
                <p>This mail is to let you know that an account was created in <a href='".$GLOBALS['url']."'>".$GLOBALS['sitename']."</a>. We are Glad to let you know that Your Booking has been completed with the details below:</p>
                <br/>
                <table border='1'>
                 <thead>
                  <tr>
                     <th>Email</th>
                     <th>".$email."</th>
                  </tr>
                  <tr>
                     <th>Name</th>
                     <th>".$fullname."</th>
                  </tr>
                  <tr>
                     <th>Cabin Name</th>
                     <th>".$cabin_name."</th>
                  </tr>                  
                  <tr>
                     <th>Price</th>
                     <th>".$cabin_price."</th>
                  </tr>                  
                  <tr>
                     <th> Booked For </th>
                     <th>".$days."</th>
                  </tr>
                  <tr>
                     <th> Arrival </th>
                     <th>".$date_start."</th>
                  </tr>
                  <tr>
                     <th> Checkout </th>
                     <th>".$date_end."</th>
                  </tr>
                 </thead>
                 </table>                 
                  <br><br>
                
                <br><br>
                <h1>Thank You. :)</h1>";


    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $GLOBALS['email'];                 // SMTP username
        $mail->Password = $GLOBALS['email_password'];                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($sender, $GLOBALS['sitename']);
        $mail->addAddress($email);     // Add a recipient
        $mail->addReplyTo($sender);

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $GLOBALS['sitename'].' BOOKING CONFIRMATION';
        $mail->Body    = $message;
        $mail->AltBody = 'This mail is to let you know that You have Booked a Cabin in  '.$GLOBALS['sitename'];

        $mail->send();
//        Return 'Message has been sent';
    } catch (Exception $e) {
//        Return 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

function bookCabin($db, $user_id, $cabin_id, $days){
    try {
        $statement = $db-> prepare('INSERT INTO cabin_booking (cabin_id, user_id, time, days) VALUES(:cabin_id, :user_id, now(),:days)');
        $statement->execute([':cabin_id' => $cabin_id,':user_id'=> $user_id,':days'=>$days]);
        if ($statement->rowCount() ==1 ) {
            return true;
        }else{
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function getCabinInfoOf($db, $cabin_id, $info='cabin_name'){
    try {
        $sql = 'SELECT '.$info.' FROM cabins WHERE id=:id';
        $statement= $db->prepare($sql);
        $statement->execute([':id'=>$cabin_id]);
        $row = $statement -> fetch();

        return $row[$info];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function getUserInfoOf($db, $user_id, $info='fname'){
    try {
        $sql = 'SELECT '.$info.' FROM users WHERE id=:id';
        $statement= $db->prepare($sql);
        $statement->execute([':id'=>$user_id]);
        $row = $statement -> fetch();
        return $row[$info];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function printAllBookingsTable($db){
    try {
        $statement=$db->prepare('SELECT * FROM cabin_booking');
        $statement->execute();
        while ($row=$statement->fetch()) {
            $booking_type = (getCabinInfoOf($db,$row['cabin_id'],'type') == 4) ? '4 days (WeekEnd)' : '5 days (Mid Week)' ;
        
        ?>
                <tr>
                    <td><?= getCabinNameOf($db,$row['cabin_id'])?></td>
                    <td><?= getTypeName($db,getCabinInfoOf($db, $row['cabin_id'], 'type'))?></td>
                    <td><?= getPlaceName($db,getCabinInfoOf($db, $row['cabin_id'], 'cat_id'))?></td>
                    <td><?= getUserInfoOf($db,$row['user_id'],'fname').' '.getUserInfoOf($db, $row['user_id'], 'lname');?></td>
                    <td><?= $row['time']?></td>
                    <td><?= $booking_type?></td>
                    <td><a href="bookings.php?checkout=1&user_id=<?=$row['user_id']?>&cabin_id=<?= $row['cabin_id']?>" onclick="return confirm('are you sure?');" class="del_cat btn btn-danger"> Checkout</a><a href="bookings.php?modify=1&user_id=<?=$row['user_id']?>&cabin_id=<?= $row['cabin_id']?>" class="del_cat btn btn-info"> Modify</a></td>
                </tr>

        <?php
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function printGalleryCoreOf($db, $cabin_id, $tagline, $slogan, $cabin_price){
    try{
        $statement= $db->prepare('SELECT * FROM cabin_gallery WHERE cabin_id = :cabin_id');
        $statement -> execute([':cabin_id'=>$cabin_id]);
        $html ='';
        while ($row = $statement->fetch()){
            ?>
            <li>
                <img src="assets/img/gallery/<?= $row['img']?>"> <!-- random image -->
                <div class="caption left-align">
                    <h4><?= $tagline;?></h4>
                    <h5 class="light grey-text text-lighten-3"><?= $slogan;?></h5>
                </div>
                <div class="caption right-align">
                    <h4 class="package-price"><?= $cabin_price?></h4><input type='hidden' class='package-base-price' value="<?= $cabin_price?>"/>
                    <p class="light grey-text text-lighten-3 currencysign">USD</p>                                 
                </div>
            </li>
<?php
        }
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}


function generateCards($db,$for='homepage',$amount=6, $type='all'){
    try{
            if ($type==='all'){
                $statement= $db->prepare('SELECT * FROM cabins, places, prices WHERE prices.cabin_id = cabins.id AND places.id=cabins.cat_id LIMIT 6 ');
                $statement->execute([':lmt' => $amount]);
            }else{
                $statement= $db->prepare('SELECT * FROM cabins, places, prices WHERE prices.cabin_id = cabins.id AND places.id=cabins.cat_id AND cabins.type = :type AND prices.regular = 1 LIMIT 6 ');
                $statement->execute([':type'=> $type]);
            }


        $i = 0;
        while ($row = $statement->fetch()) {
            ?>
            <div class="col m4 animated wow fadeInUp" data-wow-delay="<?= $i?>s">
                   <div class="card rotate-img hoverable with-fav" style="overflow: visible;">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="assets/img/<?= $row['feature_image'];?>">
                        <h6 class="price-cat"><?=$row['cat_name']?> <span class="right purple"><b><span class="package-price"><?= $row['price'];?></span><input type='hidden' class='package-base-price' value="<?= $row['price']?>"/>
                                  <span class="currencysign">USD</span></b></span></h6>
                        <div class="card-content no-padding">
                      <span class="card-title activator"><b><?= $row['cabin_name']?></b> </span>
                    </div>
                    </div>

                    <div class="card-reveal" style="display: none; transform: translateY(0px);">
                      <span class="card-title grey-text text-darken-4"><?= $row['cabin_name']?><i class="material-icons right">close</i></span>
                      <?= $row['destination_details']?>
                    </div>
                  </div>
                </div>

            <?php
            $i += 0.4;
        }
    }catch (PDOException $e){
        echo 'YOLOY    '.$e->getMessage();
    }

}



?>