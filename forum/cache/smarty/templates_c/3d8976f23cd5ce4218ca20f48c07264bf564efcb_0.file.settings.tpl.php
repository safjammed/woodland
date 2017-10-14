<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:46:47
  from "C:\xampp\htdocs\woodland\forum\admin\layout\templates\reputation\settings.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e17a97b975e6_63377448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d8976f23cd5ce4218ca20f48c07264bf564efcb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\admin\\layout\\templates\\reputation\\settings.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e17a97b975e6_63377448 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_get_opt')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.get_opt.php';
?>
<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-wrench"></i> Settings</li>
    </ol>

</section>
<div class="col-md-6">
    <div  class="box box-info">
        <form class="box-body" action="?page=reputation/settings" role="form" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Enable reputation system ?</label>
                <br/>
                <input 
                    class="simple form-control" name="enable_reputation" 
                    data-permission='yes'
                    <?php ob_start();
echo smarty_modifier_get_opt("enable_reputation");
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1 == 'yes') {?> checked="checked" <?php }?>
                    type="checkbox"  data-toggle="toggle"
                    data-on="yes" data-off="no" data-size="mini"
                    data-onstyle="success" data-offstyle="danger">
            </div>

            <div class="form-group">
                <label>Maximum times a user can give/take reputation in one day</label>
                <br/>
                <input type="text" class="form-control" name="max_rep_per_day" value="<?php echo smarty_modifier_get_opt("max_rep_per_day");?>
" />
            </div>

            <div class="form-group">
                <label>Maximum times reputation can be incremented/decremented of the same user</label>
                <br/>
                <input type="text" class="form-control" name="rep_times_same_user" value="<?php echo smarty_modifier_get_opt("rep_times_same_user");?>
" />
            </div>

            <div class="form-group">
                <label>Time in hours after which the reputation counts will be reset for above rule </label>
                <br/>
                <input type="text" class="form-control" name="rep_hours_same_user" value="<?php echo smarty_modifier_get_opt("rep_hours_same_user");?>
" />
            </div>

                    
            <div class="form-group">
                <label>Reputation required to increment reputation points of a post </label>
                <br/>
                <input type="text" class="form-control" name="rep_req_to_inc" value="<?php echo smarty_modifier_get_opt("rep_req_to_inc");?>
" />
            </div>

            <div class="form-group">
                <label>Number of posts required to increment reputation points of a post </label>
                <br/>
                <input type="text" class="form-control" name="posts_req_to_inc" value="<?php echo smarty_modifier_get_opt("posts_req_to_inc");?>
" />
            </div>

            <div class="form-group">
                <label>Reputation required to decrement reputation points of a post </label>
                <br/>
                <input type="text" class="form-control" name="rep_req_to_dec" value="<?php echo smarty_modifier_get_opt("rep_req_to_dec");?>
" />
            </div>

            <div class="form-group">
                <label>Number of posts required to decrement reputation points of a post </label>
                <br/>
                <input type="text" class="form-control" name="posts_req_to_dec" value="<?php echo smarty_modifier_get_opt("posts_req_to_dec");?>
" />
            </div>
                    
            <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
            <input type="submit" value="Save" class="btn btn-primary"/>

        </form>
    </div>
</div><?php }
}
