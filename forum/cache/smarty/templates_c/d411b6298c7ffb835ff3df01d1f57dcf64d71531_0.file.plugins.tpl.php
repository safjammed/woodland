<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:44:37
  from "C:\xampp\htdocs\woodland\forum\admin\layout\templates\plugins.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e17a1515ab27_75653161',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd411b6298c7ffb835ff3df01d1f57dcf64d71531' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\admin\\layout\\templates\\plugins.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e17a1515ab27_75653161 (Smarty_Internal_Template $_smarty_tpl) {
?>



<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-gears"></i> Plugins</li>
    </ol>

</section>

<style>
    .plgenabled{

        background-color:#fff;

    }

    .plgdisabled{

        background-color:#fff;

    }

</style>

<div class="row">
    <div class="col-lg-12">

        <div class="table-responsive">
            <table class="table"  style="background: #fff;box-shadow: 1px 1px 1px #ccc">
                <thead>
                    <tr>
                        <th><a href="#">Plugin Name</a> </th>
                        <th><a href="#">Status</a> </th>
                        <th>Description</th>

                        <th>Version </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plugins']->value, 'plugin');
foreach ($_from as $_smarty_tpl->tpl_vars['plugin']->value) {
$_smarty_tpl->tpl_vars['plugin']->_loop = true;
$__foreach_plugin_0_saved = $_smarty_tpl->tpl_vars['plugin'];
?>
                        <tr class=<?php echo $_smarty_tpl->tpl_vars['plugin']->value['rowstyle'];?>
>
                            <td>

                                <?php echo $_smarty_tpl->tpl_vars['plugin']->value['name'];?>
 <br><br>

                                <?php if ($_smarty_tpl->tpl_vars['plugin']->value['admin'] == true) {?>

                                    <a href="index.php?page=ploader&plugin=<?php echo $_smarty_tpl->tpl_vars['plugin']->value['plg_name'];?>
">[Settings]</a>

                                <?php }?>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="plugin" value="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['plg_name'];?>
" />
                                    <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />

                                    <?php if ($_smarty_tpl->tpl_vars['plugin']->value['plg_status'] == 1) {?>

                                        <input type="hidden" name="action" value="install" />
                                        <input type="submit" value="Install" class="btn btn-primary" />

                                    <?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['plg_status'] == 2) {?>

                                        <input type="hidden" name="action" value="enable" />
                                        <input type="submit" value="Enable" class="btn btn-default" />
                                    <?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['plg_status'] == 4) {?>

                                        <input type="hidden" name="action" value="upgrade" />
                                        <input type="submit" value="Upgrade" class="btn btn-success" />

                                    <?php } else { ?>  

                                        <input type="hidden" name="action" value="disable" />
                                        <input type="submit" value="Disable" class="btn" />

                                    <?php }?>


                                </form>  
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['plugin']->value['description'];?>

                                <br>
                                <br>
                                <strong>Author:</strong> <?php echo $_smarty_tpl->tpl_vars['plugin']->value['author'];?>
 <br>
                                <strong>Website:</strong> <a target="_blank" href='<?php echo $_smarty_tpl->tpl_vars['plugin']->value['author_url'];?>
'><?php echo $_smarty_tpl->tpl_vars['plugin']->value['author_url'];?>
</a>
                            </td>

                            <td><?php echo $_smarty_tpl->tpl_vars['plugin']->value['version'];?>
</td>

                        </tr>
                    <?php
$_smarty_tpl->tpl_vars['plugin'] = $__foreach_plugin_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                </tbody>
            </table>
        </div>

    </div>
</div><?php }
}
