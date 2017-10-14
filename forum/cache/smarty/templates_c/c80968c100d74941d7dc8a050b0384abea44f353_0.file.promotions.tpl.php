<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:46:51
  from "C:\xampp\htdocs\woodland\forum\admin\layout\templates\reputation\promotions.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e17a9b54d447_18005555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c80968c100d74941d7dc8a050b0384abea44f353' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\admin\\layout\\templates\\reputation\\promotions.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e17a9b54d447_18005555 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-level-up"></i> Promotions</li>
    </ol>

</section>

<style type='text/css'>

    .well {

        background: #fff;
    }

    table .btn{
        padding: 1px 5px 1px;
        font-size: 12px;
        margin-right: -3px;
    }

</style>

<div class='well well-sm'>
    <p>The user will be promoted or demoted according to the rules mentioned here.
        <br/>

        If a new rule is added, it will only take affect when a user's reputation or post count changes
    </p>

</div>
<div class="col-md-6">
    <div  class="box box-info">


        <form class="box-body" action="?page=reputation/promotions&action=add" role="form" method="post" enctype="multipart/form-data">

            <label>If a user has</label>
            <br/>
            <div class="input-group">
                <input name="reputation" placeholder='Enter required reputation points here' type="number" class="form-control" required>
                <span class="input-group-addon" id="basic-addon2">reputation</span>
            </div>
            <br/>
            <select name="type" class='form-control' >
                <option value="0">AND</option>
                <option value="1">OR</option>                
            </select>
            <br/>
            <div class="input-group">
                <input name="posts" placeholder='Enter required no. of posts here' type="text" class="form-control" required>
                <span class="input-group-addon" id="basic-addon2">posts</span>
            </div>
            <br/>
            <label>promote/demote to</label>
            <br/>
            <select name="role" class='form-control'>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'group');
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_0_saved = $_smarty_tpl->tpl_vars['group'];
?>
                    <option value='<?php echo $_smarty_tpl->tpl_vars['group']->value['rid'];?>
'><?php echo $_smarty_tpl->tpl_vars['group']->value['rname'];?>
</option>
                <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
            </select>
            <br/>

            <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
            <input type="submit" value="Add rule" class="btn btn-primary"/>

        </form>
    </div>
</div>
<div class="col-md-12">
    <div  class="box box-info">

        <table class="table">

            <tr>
                <th>

                </th>
                <th>
                    reputation
                </th>

                <th>
                    type
                </th>

                <th>
                    posts
                </th>

                <th>
                    promote/demote to group
                </th>
                <th>
                    action
                </th>
            </tr>         

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rules']->value, 'rule');
foreach ($_from as $_smarty_tpl->tpl_vars['rule']->value) {
$_smarty_tpl->tpl_vars['rule']->_loop = true;
$__foreach_rule_1_saved = $_smarty_tpl->tpl_vars['rule'];
?>
                <tr>

                    <td>
                        If user has
                    </td>

                    <td id="reputation_<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['rule']->value['reputation'];?>

                    </td>

                    <td>

                        <span id="type_<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
" style="display:none"><?php echo $_smarty_tpl->tpl_vars['rule']->value['type'];?>
</span>
                        <?php if ($_smarty_tpl->tpl_vars['rule']->value['type'] == 0) {?>
                            AND
                        <?php } else { ?>
                            OR
                        <?php }?> 
                    </td>

                    <td id="posts_<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['rule']->value['posts'];?>

                    </td>

                    <td>
                        <span id="group_<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
" style="display:none"><?php echo $_smarty_tpl->tpl_vars['rule']->value['rid'];?>
</span>                            
                        <?php echo $_smarty_tpl->tpl_vars['rule']->value['rname'];?>

                    </td>

                    <td>
                        <div style="display: inline-block" id="edit_<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
" class="btn btn-success edit">edit</div> &nbsp;&nbsp; 
                        <div style="display: inline-block">
                            <form action="?page=reputation/promotions&action=delete" method="POST">
                                <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
" name="ruleid" />
                                <button type="submit" id="delete_<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
" class="btn btn-danger delete"> delete</button>
                            </form>
                        </div>
                    </td>
                </tr>

            <?php
$_smarty_tpl->tpl_vars['rule'] = $__foreach_rule_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table>
    </div>

    <div id="edit_rule" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editing rule</h4>
                </div>
                <form action="?page=reputation/promotions&action=edit" method="POST">
                    <div class="modal-body">

                        <label>If a user has</label>
                        <br/>
                        <div class="input-group">
                            <input id="modal_rep" name="reputation" placeholder='Enter required reputation points here' type="number" class="form-control" required>
                            <span class="input-group-addon" id="basic-addon2">reputation</span>
                        </div>
                        <br/>
                        <select id="modal_type" name="type" class='form-control' >
                            <option value="0">AND</option>
                            <option value="1">OR</option>                
                        </select>
                        <br/>
                        <div class="input-group">
                            <input id="modal_posts" name="posts" placeholder='Enter required no. of posts here' type="text" class="form-control" required>
                            <span class="input-group-addon" id="basic-addon2">posts</span>
                        </div>
                        <br/>
                        <label>promote/demote to</label>
                        <br/>
                        <select id="modal_group" name="role" class='form-control'>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'group');
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_2_saved = $_smarty_tpl->tpl_vars['group'];
?>
                                <option value='<?php echo $_smarty_tpl->tpl_vars['group']->value['rid'];?>
'><?php echo $_smarty_tpl->tpl_vars['group']->value['rname'];?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                        </select>
                        <br/>

                        <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                        <input type="hidden" id="modal_ruleid" name="ruleid" value="" />
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
            </div>
        </div>    </div>

</div>

<?php echo '<script'; ?>
 type="text/javascript">


    jQuery(document).ready(function ($) {

        $('.edit').click(function () {


            var id = $(this).attr('id').replace("edit_", "");

            var rep = parseInt($('#reputation_' + id).html());
            var type = $('#type_' + id).html();
            var posts = parseInt($('#posts_' + id).html());
            var rid = $('#group_' + id).html();

            $('#modal_rep').val(rep);
            $('#modal_type option[value=' + type + ']').prop('selected', true);
            $('#modal_posts').val(posts);
            $('#modal_group option[value=' + rid + ']').prop('selected', true);
            $('#modal_ruleid').val(id);

            $('#edit_rule').modal();

        });


        $('.delete').click(function () {


            $.get('<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
Ajax/cron/run/' + name, {
                token: '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
'
            }, function (data) {

                if (data != '') {

                    alert(data);
                }
            });

        })



    });
<?php echo '</script'; ?>
><?php }
}
