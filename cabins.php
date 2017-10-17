<?php 
$page_title="Cabins";
include_once 'partials/head.php';
//FILTERS
$currency = isset($_GET['currency']) ? $_GET['currency']: 'usd';
$start_date = isset($_GET['start']) ? $_GET['start']: 'all';
$end_date = isset($_GET['end']) ? $_GET['end'] : 'all';



//Parse Booking Request
if (isset($_POST['bookBtn'])) {
	//Collect Data
	$fname = $_POST['fname'];
	$lname=$_POST['lname'];
	$email = $_POST['email'];
	$days = $_POST['days'];
	$fullname = $fname.' '.$lname;
	$daysForMail = ($days == 4) ? '4 days (Friday to Monday)' : '5 days (Monday to Friday)' ;
	$cabin_name =$_POST['cabin_name'];
	$user_id = $_POST['user_id'];
	$cabin_id =$_POST['cabin_id'];
	$date_start = $_POST['date_start'];
	$date_end = $_POST['date_end'];
	$cabin_price = $_POST['cabin_price'];

	if(bookCabin($db, $user_id, $cabin_id, $days) == true){
		swal('Congratulations!', 'The cabin has been booked. Check Email for confirmation','success');
		sendBookingEmail($email, $fullname, $cabin_name, $daysForMail, $date_end, $date_start, $cabin_price);
	}
}


 ?>
<div class="row all-wrap">
<?php IF(isset($_GET['type'])): ?>
 	<?php include_once 'html/package-link.php'; ?>
<?php ELSEIF (isset($_GET['details'])) :?>
	<?php include_once 'html/package-details.php'; ?>
<?php ELSE : ?>
	<?php jsRedirect(); ?>
<?php ENDIF; ?>

<div class="fixed-action-btn animated bounceIn" style="bottom: 45px; right: 24px;">
	<a class="btn-floating btn-large waves-effect waves-light purple" href="#" target="_TOP"><i class="material-icons">arrow_drop_up</i></a>
</div>
</div>

  <?php include_once 'partials/footer.php'; ?>