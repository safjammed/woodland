<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:46:08
  from "C:\xampp\htdocs\woodland\forum\admin\layout\templates\mail\configuration.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e17a70345589_04232026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a64895a8672702f15ae6bafd15b6bc30c069e1ec' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\admin\\layout\\templates\\mail\\configuration.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e17a70345589_04232026 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_get_opt')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.get_opt.php';
?>
<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class=""><i class="fa fa-envelope"></i> Mail Settings</li>
         <li class="active"><i class="fa fa-gear"></i> Configuration</li>
    </ol>
    
</section>
<div class="col-md-6">
<div  class="box box-info">
<form class="box-body" action="?page=mail/configuration" role="form" method="post" enctype="multipart/form-data">



Mail Type:


<select name='mail_type' class="form-control">
    <option value='smtp' <?php if (smarty_modifier_get_opt("mail_type") == 'smtp') {?> selected <?php }?>>SMTP</option>
    <option value='mail'  <?php if (smarty_modifier_get_opt("mail_type") == 'mail') {?> selected <?php }?>>mail()</option>
    
</select><br>

<hr>
<span style="font-size:smaller">The below settings are required only if you have selected SMTP above.</span>

<br><br>
SMTP Protocol:
<input type="text" class="form-control" name="smtp_protocol" value="<?php echo smarty_modifier_get_opt("smtp_protocol");?>
" />

<br/>

SMTP Server:
<input type="text" class="form-control" name="smtp_server" value="<?php echo smarty_modifier_get_opt("smtp_server");?>
" /><br/>

SMTP Port:
<input type="text" class="form-control" name="smtp_port" value="<?php echo smarty_modifier_get_opt("smtp_port");?>
" /><br/>

SMTP username:
<input type="text" class="form-control" name="smtp_username" value="<?php echo smarty_modifier_get_opt("smtp_username");?>
" /><br/>

SMTP Password:
<input type="text" class="form-control" name="smtp_password" value="<?php echo smarty_modifier_get_opt("smtp_password");?>
" /><br/>


<input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />

<input type="submit" value="Save" class="btn btn-primary"/>
</form>
 
<?php }
}
