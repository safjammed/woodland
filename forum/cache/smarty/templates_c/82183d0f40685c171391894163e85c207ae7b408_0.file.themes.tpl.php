<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:46:39
  from "C:\xampp\htdocs\woodland\forum\admin\layout\templates\ui\themes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e17a8fc8e522_40614411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82183d0f40685c171391894163e85c207ae7b408' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\admin\\layout\\templates\\ui\\themes.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e17a8fc8e522_40614411 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li><i class="fa fa-laptop"></i> UI Elements</li>
         <li><i class="fa fa-image"></i> Themes</li>
    </ol>
    
</section>

<?php
$__section_thm_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_thm']) ? $_smarty_tpl->tpl_vars['__smarty_section_thm'] : false;
$__section_thm_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['themes']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_thm_0_total = $__section_thm_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_thm'] = new Smarty_Variable(array());
if ($__section_thm_0_total != 0) {
for ($__section_thm_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_thm']->value['index'] = 0; $__section_thm_0_iteration <= $__section_thm_0_total; $__section_thm_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_thm']->value['index']++){
?>
<div class="col-md-4">
    <div class="box box-solid box-primary">
        <div class="box-header">
            <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['themes']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_thm']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_thm']->value['index'] : null)]['name'];?>
</h3>

        </div>
        <div class="box-body">
            
            <img src="<?php echo $_smarty_tpl->tpl_vars['themes']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_thm']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_thm']->value['index'] : null)]['thumb'];?>
" style="width:250px" />
            <hr>
            <p>
                <?php echo $_smarty_tpl->tpl_vars['themes']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_thm']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_thm']->value['index'] : null)]['description'];?>

            </p>
        </div><!-- /.box-body -->
        <div class="box-footer">
        <?php if ($_smarty_tpl->tpl_vars['themes']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_thm']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_thm']->value['index'] : null)]['active']) {?> 
            Currently Active
         <?php } else { ?>   
        <form class="box-body" action="?page=ui/themes" role="form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="theme" value="<?php echo $_smarty_tpl->tpl_vars['themes']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_thm']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_thm']->value['index'] : null)]['name'];?>
" />
            <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
            <button class="btn btn-success">Activate</button>
        </form>
           <?php }?> 
        </div>
    </div>
</div>
<?php
}
}
if ($__section_thm_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_thm'] = $__section_thm_0_saved;
}
}
}
