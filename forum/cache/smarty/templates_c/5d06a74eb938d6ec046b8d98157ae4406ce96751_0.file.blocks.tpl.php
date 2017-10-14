<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:45:34
  from "C:\xampp\htdocs\woodland\forum\admin\layout\templates\ui\blocks.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e17a4e0f29e9_69675077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d06a74eb938d6ec046b8d98157ae4406ce96751' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\admin\\layout\\templates\\ui\\blocks.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e17a4e0f29e9_69675077 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\Ext\\Smarty\\plugins\\function.html_options.php';
?>
<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="fa fa-laptop"></i> UI Elements</li>
        <li><i class="fa fa-cubes"></i> Blocks</li>
    </ol>

</section>
<div class="col-md-12">

    <div class="box box-info">
        <form  action="?page=ui/blocks" role="form" method="post" enctype="multipart/form-data">
            <input type="hidden" value="!AwCT43Vhl#$@kDbkF" name="test_post"/>
            <div class="box-header">
                <br>
                <h3 class="box-title">Blocks for theme: <em><?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
</em></h3>

            </div><!-- /.box-header -->
            <div class="box-body table-responsive">


                <div class='col-md-2' style='padding:0'> 
                    <a class='btn btn-primary btn-block' style='color:#fff' href="?page=ui/blocks&action=addnewblock"><i class="fa fa-plus"></i> Add Block</a>
                </div>
                <br><br>
                <hr>
                <table id="blocktable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Block Name</th>
                            <th>Region</th>
                            <th>Weight</th>
                            <th>Type</th>
                            <th>Configure</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
$__section_blk_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_blk']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk'] : false;
$__section_blk_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['blocks']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_blk_0_total = $__section_blk_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_blk'] = new Smarty_Variable(array());
if ($__section_blk_0_total != 0) {
for ($__section_blk_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] = 0; $__section_blk_0_iteration <= $__section_blk_0_total; $__section_blk_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']++){
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['blocks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['title'];?>
</td>
                                <td>
                                    <select name="bid_<?php echo $_smarty_tpl->tpl_vars['blocks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['id'];?>
" size="1" class='form-control'>
                                        <option value="<none>">&lt;none&gt;</option>
                                        <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['av_blocks']->value,'output'=>$_smarty_tpl->tpl_vars['av_blocks']->value,'selected'=>$_smarty_tpl->tpl_vars['blocks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['region']),$_smarty_tpl);?>

                                    </select>

                                </td>
                                <td>
                                    <input type="number" name="bweight_<?php echo $_smarty_tpl->tpl_vars['blocks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['blocks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['weight'];?>
" class="form-control" />
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['blocks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['module'];?>
</td>
                                <td>
                                    <span class="">                                                             
                                        <a class='btn btn-info btn-flat btn-sm' href="index.php?page=ui/blocks&action=editblock&id=<?php echo $_smarty_tpl->tpl_vars['blocks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['id'];?>
"><i style="color:#fff" class="fa fa-edit"></i> Edit</a>                                                            
                                        &nbsp;&nbsp; <a class='btn btn-danger btn-flat btn-sm' href="javascript:void(0)" onclick="delete_block(<?php echo $_smarty_tpl->tpl_vars['blocks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['id'];?>
)"><i style="color:#fff" class="fa fa-trash-o"></i> Delete</a>
                                    </span>
                                </td>
                            </tr>
                        <?php
}
}
if ($__section_blk_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_blk'] = $__section_blk_0_saved;
}
?>


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Block Name</th>
                            <th>Region</th>
                            <th>Weight</th>
                            <th>Type</th>
                            <th>Configure</th>

                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                <input type="submit" value="Save" class="btn btn-primary"/>
            </div>
        </form>
    </div>    


</div> 

<?php echo '<script'; ?>
>


    function delete_block(id) {


        var flag = confirm("Are you sure you want to delete this block?");

        if (flag == true) {

            console.log("block " + id + " delete req sent");
            window.location = "index.php?page=ui/blocks&id="+id+"&action=delete&CSRF_token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
";

        } else {
            console.log("req cancelled");
        }



    }

<?php echo '</script'; ?>
>
<?php }
}
