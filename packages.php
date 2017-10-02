<?php 
$page_title="Dream Holidays";
include_once 'partials/head.php';



 ?>
<div class="row all-wrap">
<?php IF(isset($_GET['category'])): ?>
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