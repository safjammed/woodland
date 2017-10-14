<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:45:16
  from "C:\xampp\htdocs\woodland\forum\admin\layout\templates\pages\pages.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e17a3c0fb446_15726143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad9aa97b9a0d8b9d7858579ca224bc82c10e7b32' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\admin\\layout\\templates\\pages\\pages.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e17a3c0fb446_15726143 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li><i class="fa fa-file-powerpoint-o"></i> Pages</li>
    </ol>

</section>
<div class="col-md-12">

    <div class="box box-info">
        <form  action="?page=ui/blocks" role="form" method="post" enctype="multipart/form-data">
            <input type="hidden" value="!AwCT43Vhl#$@kDbkF" name="test_post"/>
            <div class="box-header">
                <br>


            </div><!-- /.box-header -->
            <div class="box-body table-responsive">


                <div class='col-md-2' style='padding:0'> 
                    <a class='btn btn-primary btn-block' style='color:#fff' href="?page=pages/pages&action=addnewpage"><i class="fa fa-plus"></i> Add Page</a>
                </div>
                <br><br>
                <hr>
                <table id="blocktable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Page Title</th>
                            <th>Page URL</th>
                            <th>Actions</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php
$__section_blk_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_blk']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk'] : false;
$__section_blk_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['pages']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_blk_0_total = $__section_blk_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_blk'] = new Smarty_Variable(array());
if ($__section_blk_0_total != 0) {
for ($__section_blk_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] = 0; $__section_blk_0_iteration <= $__section_blk_0_total; $__section_blk_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']++){
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['pages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['title'];?>
</td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['pages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['url'];?>


                                </td>

                                <td>
                                    <span class="">      
                                        <a class='btn btn-success btn-flat btn-sm' target="_blank" href="../index.php?u=/page/<?php echo $_smarty_tpl->tpl_vars['pages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['pages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['url'];?>
"><i style="color:#fff" class="fa fa-eye"></i> View</a>                                                            
                                        &nbsp;&nbsp; <a class='btn btn-info btn-flat btn-sm' href="index.php?page=pages/pages&action=editpage&id=<?php echo $_smarty_tpl->tpl_vars['pages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['id'];?>
"><i style="color:#fff" class="fa fa-edit"></i> Edit</a>                                                            
                                        &nbsp;&nbsp; <a class='btn btn-danger btn-flat btn-sm' href="javascript:void(0)" onclick="delete_page(<?php echo $_smarty_tpl->tpl_vars['pages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_blk']->value['index'] : null)]['id'];?>
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

                </table>
            </div><!-- /.box-body -->


        </form>
    </div>    


</div> 

<?php echo '<script'; ?>
>


    function delete_page(id) {


        var flag = confirm("Are you sure you want to delete this Page?");

        if (flag == true) {

            console.log("block " + id + " delete req sent");
            window.location = "index.php?page=pages/pages&id=" + id + "&action=delete&CSRF_token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
";

        } else {
            console.log("req cancelled");
        }



    }

<?php echo '</script'; ?>
>
<?php }
}
