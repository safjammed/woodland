<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-17 01:27:54
  from "C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\user\register.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e54e8a72ee88_06548406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80ee85f10f0584ad7fb7df0f9b0161acc5cd0496' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\sites\\default\\themes\\2k18\\templates\\user\\register.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_59e54e8a72ee88_06548406 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_load_block')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.load_block.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
new Block_body_1052259e54e8a723762_50763379($_smarty_tpl);
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\user\register.tpl */
class Block_body_1052259e54e8a723762_50763379 extends Smarty_Internal_Block
{
public $name = 'body';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->blockNesting++;
?>


    <style type="text/css">

        body {
            overflow-x: hidden;
        }
        .codo_reg_error {
            position: absolute;
            background: #d14836;
            border: 1px solid #d14836;
            color: white;
            padding: 5px;
            border-radius: 1px;
            display: none;
        }

        .codo_reg_error_block .codo_reg_error {

            position: static;
            display: block;

        }

        #password {

            padding-right: 27px;
        }

        #codo_reg_pass { 
            position: relative;
        }
        #letterViewer { 
            position: absolute;
            right: -72px;
            top: 0;
            width: 100px;
            font: bold 30px Helvetica, Sans-Serif;
        }  

        .codo_already_registered {

            color: #585858;
            display: inline-block;
            margin-left: 4px;
        }

        #breadcrumb {

            padding: 0;
        }

        .container {

            padding-top: 76px;
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

            <?php echo smarty_modifier_load_block("block_register_form_before");?>
  

            <div class="codo_block col-md-12">

                <?php if (!empty($_smarty_tpl->tpl_vars['errors']->value)) {?>
                    <div class="codo_reg_error_block">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
$__foreach_error_0_saved = $_smarty_tpl->tpl_vars['error'];
?>
                            <div class='codo_reg_error'> <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
 </div>

                        <?php
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                    </div>
                <?php }?>

                <?php echo smarty_modifier_load_block("block_register_form_start");?>
  
                <form id="codo_register_form" action="<?php echo @constant('RURI');?>
user/register" method="POST" >
                    <div class="row">

                        <div class="col-md-6">            
                            <input data-length="<?php echo $_smarty_tpl->tpl_vars['min_username_len']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['register']->value->username;?>
" class="codo_input" id="reg_username" type="text" name="username" placeholder="<?php echo _t("username");?>
" required/>
                            <div class="codo_reg_error"></div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-6">          
                            <div id="codo_reg_pass">
                                <input data-length="<?php echo $_smarty_tpl->tpl_vars['min_pass_len']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['register']->value->password;?>
" class="codo_input" id="password" type="password" name="password" placeholder="<?php echo _t("password");?>
" required/>
                                <div class="codo_reg_error"></div>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">            
                            <input value="<?php echo $_smarty_tpl->tpl_vars['register']->value->mail;?>
" class="codo_input" type="email" id="reg_mail" name="mail" placeholder="<?php echo _t("email");?>
" required=""/>
                            <div class="codo_reg_error"></div>                
                        </div>

                    </div>


                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_fields']->value, 'field');
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
$__foreach_field_1_saved = $_smarty_tpl->tpl_vars['field'];
?>


                        <div class="row" id="custom_field_<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
">
                            <div class="col-md-6">            


                                <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'input') {?>
                                    <input value="<?php echo $_smarty_tpl->tpl_vars['field']->value['def_val'];?>
" class="codo_input" type="<?php echo $_smarty_tpl->tpl_vars['field']->value['input_type'];?>
" name="input_<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
" placeholder="<?php ob_start();
echo $_smarty_tpl->tpl_vars['field']->value['title'];
$_prefixVariable1=ob_get_clean();
echo _t($_prefixVariable1);?>
"
                                           <?php if (!($_smarty_tpl->tpl_vars['field']->value['input_length'] == 0)) {?> maxlength="<?php echo $_smarty_tpl->tpl_vars['field']->value['input_length'];?>
"<?php }?>
                                           <?php if ($_smarty_tpl->tpl_vars['field']->value['is_mandatory']) {?>required=""<?php }?>/>

                                <?php } else { ?>
                                    <div class="form-group">
                                        <?php if ($_smarty_tpl->tpl_vars['field']->value['title']) {?>
                                            <label for="<?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>
" ><?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>
</label>
                                        <?php }?>

                                        <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'radio') {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value['data']['options'], 'text');
foreach ($_from as $_smarty_tpl->tpl_vars['text']->value) {
$_smarty_tpl->tpl_vars['text']->_loop = true;
$__foreach_text_2_saved = $_smarty_tpl->tpl_vars['text'];
?>

                                                <div class="radio">
                                                    <label>
                                                        <input
                                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['def_val'] == $_smarty_tpl->tpl_vars['text']->value) {?>checked="checked"<?php }?>
                                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['is_mandatory']) {?>required=""<?php }?> 
                                                            type="radio" name="input_<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
"/><?php ob_start();
echo $_smarty_tpl->tpl_vars['text']->value;
$_prefixVariable2=ob_get_clean();
echo _t($_prefixVariable2);?>

                                                    </label>
                                                </div>
                                            <?php
$_smarty_tpl->tpl_vars['text'] = $__foreach_text_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type'] == 'dropdown') {?>
                                            <select class="form-control" <?php if ($_smarty_tpl->tpl_vars['field']->value['is_mandatory']) {?>required=""<?php }?> name="input_<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
">

                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value['data']['options'], 'text');
foreach ($_from as $_smarty_tpl->tpl_vars['text']->value) {
$_smarty_tpl->tpl_vars['text']->_loop = true;
$__foreach_text_3_saved = $_smarty_tpl->tpl_vars['text'];
?>

                                                    <option <?php if ($_smarty_tpl->tpl_vars['field']->value['def_val'] == $_smarty_tpl->tpl_vars['text']->value) {?>selected="selected"<?php }?>><?php ob_start();
echo $_smarty_tpl->tpl_vars['text']->value;
$_prefixVariable3=ob_get_clean();
echo _t($_prefixVariable3);?>
</option>
                                                <?php
$_smarty_tpl->tpl_vars['text'] = $__foreach_text_3_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                                            </select>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type'] == 'checkbox') {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value['data']['options'], 'text');
foreach ($_from as $_smarty_tpl->tpl_vars['text']->value) {
$_smarty_tpl->tpl_vars['text']->_loop = true;
$__foreach_text_4_saved = $_smarty_tpl->tpl_vars['text'];
?>

                                                <div class="checkbox">
                                                    <label>
                                                        <input <?php if ($_smarty_tpl->tpl_vars['field']->value['def_val'] == $_smarty_tpl->tpl_vars['text']->value) {?>checked="checked"<?php }?> 
                                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['is_mandatory']) {?>required=""<?php }?> type="checkbox" name="input_<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
[]" /><?php ob_start();
echo $_smarty_tpl->tpl_vars['text']->value;
$_prefixVariable4=ob_get_clean();
echo _t($_prefixVariable4);?>

                                                    </label>
                                                </div>
                                            <?php
$_smarty_tpl->tpl_vars['text'] = $__foreach_text_4_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                                            
                                        <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type'] == 'textarea') {?>
                                            
                                            <textarea <?php if ($_smarty_tpl->tpl_vars['field']->value['is_mandatory']) {?>required=""<?php }?> name="input_<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['field']->value['def_val'];?>
</textarea>
                                        <?php }?>
                                    </div>
                                <?php }?>                                    

                            </div>
                        </div>
                    <?php
$_smarty_tpl->tpl_vars['field'] = $__foreach_field_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <?php if (isset($_smarty_tpl->tpl_vars['recaptcha']->value)) {?>        
                        <div class="row col-md-12">

                            <?php echo $_smarty_tpl->tpl_vars['recaptcha']->value;?>

                        </div>
                    <?php }?>



                    <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['CSRF_token']->value;?>
" />
                    <div class="row">

                        <div class="col-md-12">
                            <button class="codo_btn codo_btn_primary" id="codo_register"><?php echo _t("Register");?>
</button>
                            <div class="codo_already_registered">
                                <?php echo _t("Already registered?");?>
 <a  class="codo_login_register_link" href="<?php echo @constant('RURI');?>
user/login"><?php echo _t("Login here");?>
</a>    
                            </div>
                        </div>
                    </div>

                </form>
                <?php echo smarty_modifier_load_block("block_register_form_end");?>
  

            </div>
            <?php echo smarty_modifier_load_block("block_register_form_after");?>
  

        </div>
    </div>

    <?php echo '<script'; ?>
 type="text/javascript">

        codo_defs.register = {
            pass_min: parseInt('<?php echo $_smarty_tpl->tpl_vars['min_pass_len']->value;?>
'),
            username_min: parseInt('<?php echo $_smarty_tpl->tpl_vars['min_username_len']->value;?>
')
        };

        CODOFVAR = {
            trans: {
                username_short: '<?php echo _t("username cannot be less than ");?>
' + codo_defs.register.username_min + '<?php echo _t(" characters");?>
',
                username_exists: '<?php echo _t("username already exists");?>
',
                password_short: '<?php echo _t("passowrd cannot be less than ");?>
' + codo_defs.register.pass_min + '<?php echo _t(" characters");?>
',
                mail_exists: '<?php echo _t("mail already exists");?>
'

            }
        }

    <?php echo '</script'; ?>
>

<?php
$_smarty_tpl->ext->_inheritance->blockNesting--;
}
}
/* {/block 'body'} */
}
