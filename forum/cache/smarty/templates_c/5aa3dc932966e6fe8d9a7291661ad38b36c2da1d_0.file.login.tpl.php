<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-17 01:26:12
  from "C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\user\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e54e24359929_72868436',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5aa3dc932966e6fe8d9a7291661ad38b36c2da1d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\sites\\default\\themes\\2k18\\templates\\user\\login.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_59e54e24359929_72868436 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_load_block')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.load_block.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
new Block_body_466859e54e242dd039_63821309($_smarty_tpl);
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\user\login.tpl */
class Block_body_466859e54e242dd039_63821309 extends Smarty_Internal_Block
{
public $name = 'body';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->blockNesting++;
?>


    <style type="text/css">

        .codo_login_register_link {

            margin-right: 5px;
        }

        .remember_me_txt {

            color: grey;
        }

        #codo_login_error {

            padding: 10px;
            display: none;
        }

        #breadcrumb {

            padding: 0;
        }

        body {

            overflow-x: hidden;
        }


    </style>

    <div id="breadcrumb" class="col-md-12">

        <div class="codo_breadcrumb_list btn-breadcrumb hidden-xs">                
            <?php echo smarty_modifier_load_block("block_breadcrumbs_before");?>

            <a href="<?php echo @constant('RURI');
echo $_smarty_tpl->tpl_vars['site_url']->value;?>
"><div><i class="glyphicon glyphicon-home"></i></div></a>
                        <?php echo smarty_modifier_load_block("block_breadcrumbs_after");?>

        </div>
    </div>

    <div class="container">

        <div class="row">


            <?php if (!$_smarty_tpl->tpl_vars['can_view_forum']->value) {?> 

                <div class="codo_notification codo_notification_error col-md-12">

                    <?php echo _t("You need to login to view the forum");?>

                </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['came_from_topic']->value == 'yes') {?>

                <div class="codo_notification codo_notification_warning col-md-12">

                    You need to be logged in to reply                 
                </div>
            <?php }?>


            <div id="codo_login_error" class="codo_notification codo_notification_error col-md-12"><?php echo _t("Please fill both the fields!");?>
</div>

            <?php echo smarty_modifier_load_block("block_login_form_before");?>
  

            <div id="codo_login_container" class="codo_block col-md-12">
                <?php echo smarty_modifier_load_block("block_login_form_start");?>
  

                <div class="row">

                    <div class="col-md-6">            
                        <input class="codo_input" type="text" id="name" maxlength="60" placeholder="<?php echo _t("username");?>
" required="required"/>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-6">            
                        <input class="codo_input" type="password" id="pass" maxlength="128" placeholder="<?php echo _t("password");?>
" required="required"/>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">
                        <input id="remember_me" type="checkbox" /><span class="remember_me_txt"><?php echo _t(" Keep me logged in");?>
</span>
                        <button class="codo_btn codo_btn_primary" id="codo_login"><?php echo _t("Login");?>
</button>
                    </div>

                </div>


                <div class="row">

                    <div class="col-md-6">
                        <a  class="codo_login_register_link" href="<?php echo $_smarty_tpl->tpl_vars['register_url']->value;?>
"><?php echo _t("Register");?>
</a>
                        <a href="<?php echo @constant('RURI');?>
user/forgot"><?php echo _t("I forgot my password");?>
</a>            
                    </div>


                </div>
                <?php echo smarty_modifier_load_block("block_login_form_end");?>
  

            </div>
            <?php echo smarty_modifier_load_block("block_login_form_after");?>
  

        </div>
    </div>
    <?php echo '<script'; ?>
 type="text/javascript">

        function on_codo_loaded() {

            jQuery('document').ready(function ($) {

                //keep initial focus
                $('#name').focus();

                $('input').bind('keypress', function (e) {

                    var code = e.keyCode || e.which;
                    if (code === 13) { //Enter keycode

                        $('#codo_login').trigger('click');
                    }
                });


                $('#codo_login').on('click', function () {

                    //if (!CODOF.authenticator) {

                    //No alternative authenticator exists so use default
                    $.getJSON(
                            codo_defs.url + 'Ajax/user/login/dologin',
                            {
                                username: $.trim($('#name').val()),
                                password: $.trim($('#pass').val()),
                                remember: $('#remember_me').is(":checked"),
                                token: codo_defs.token
                            },
                            function (response) {

                                if (response.msg === "success") {

                                    window.location.href = codo_defs.url + 'user/profile';
                                } else {

                                    $('#codo_login_error').html(response.msg).show('slow');
                                    CODOF.ui.saccade($('#codo_login_error'));
                                }
                            }
                    );

                    // }
                });


            });

        }
        ;

    <?php echo '</script'; ?>
>
<?php
$_smarty_tpl->ext->_inheritance->blockNesting--;
}
}
/* {/block 'body'} */
}
