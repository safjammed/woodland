<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-17 01:30:14
  from "C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\user\profile\edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e54f167c95f7_99153871',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c4c8e9f4f1e3d938b0f916b8a2b2269c141297c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\sites\\default\\themes\\2k18\\templates\\user\\profile\\edit.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
    'file:forum/notification_level.tpl' => 4,
  ),
),false)) {
function content_59e54f167c95f7_99153871 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_load_block')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.load_block.php';
if (!is_callable('smarty_function_match_option')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\function.match_option.php';
if (!is_callable('smarty_function_match_switch')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\function.match_switch.php';
if (!is_callable('smarty_modifier_get_preference')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.get_preference.php';
if (!is_callable('smarty_modifier_abbrev_no')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.abbrev_no.php';
if (!is_callable('smarty_modifier_get_pretty_time')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.get_pretty_time.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>






<?php 
new Block_body_467459e54f167ae7c0_86680022($_smarty_tpl);
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\user\profile\edit.tpl */
class Block_body_467459e54f167ae7c0_86680022 extends Smarty_Internal_Block
{
public $name = 'body';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->blockNesting++;
?>



	<div class="container-fluid top-custom-container-profile">
		<div class="container">
			<div class="row">
				<div class="col-md-1">
					
                    <img draggable="false" class="img-rounded profile-avatar-img" src="<?php echo $_smarty_tpl->tpl_vars['user']->value->avatar;?>
" />
				</div>	
                <div class="codo_username col-md-6 col-sm-12 codo-username-profile">
					<h4><?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</h4>
					<p>
					<?php echo _t("Post all your questions and problems related to codoforum here.");?>

					</p>
				</div> 
			</div>
			<hr align="left" style="width:65%;"/>
			<div class="row nav-main-profile">
				<div class="col-md-1 col-xs-2 nav-box-profile">
					<a href="index.php?u=user/profile"><span class="nav-text-profile" id="codo_edit_profile"><?php echo _t("Overview");?>
</span></a>
                                </div>
				<div class="col-md-1 col-xs-2 nav-box-profile nav-box-profile-active">
					<a href="#edit" role="tab" data-toggle="tab"><span class="nav-text-profile" id="codo_edit_profile"><?php echo _t("Edit Account");?>
</span></a>
				</div>
				<div class="col-md-1 col-xs-2 nav-box-profile">
					<a href="#preferences" role="tab" data-toggle="tab"><span class="nav-text-profile"><?php echo _t("Preference");?>
</span></a>
				</div>
				<div class="col-md-1 col-xs-2 nav-box-profile">
					<a href="#subscriptions" role="tab" data-toggle="tab"><span class="nav-text-profile"><?php echo _t("Subscription");?>
</span></a>
				</div>
				<div class="col-md-1 col-xs-2 nav-box-profile">
					<a href="#notifications" role="tab" data-toggle="tab"><span class="nav-text-profile"><?php echo _t("Notification");?>
</span></a>
				</div>
			</div>
		</div>
	</div>
    <div class="container codo_profile_container" style="padding-top:0px">
	
        <div id="profile_edit_status" class="codo_notification" style="display: none"></div>


        <div class="row">
		
                <?php echo smarty_modifier_load_block("block_profile_edit_before");?>

							
             <div class="col-md-8 col-sm-12 tab-content">

                <div class="tab-pane fade in active" id="edit">
				

                    <?php echo smarty_modifier_load_block("block_profile_edit_details_before");?>


                    <div class="codo_edit_profile">
					
                        <?php echo smarty_modifier_load_block("block_profile_edit_details_start");?>


                        <?php if (isset($_smarty_tpl->tpl_vars['file_upload_error']->value)) {?>

                            <div class="codo_notification codo_notification_error"><?php echo $_smarty_tpl->tpl_vars['file_upload_error']->value;?>
</div>
                        <?php }?>

                        <?php if (isset($_smarty_tpl->tpl_vars['user_profile_edit']->value) && $_smarty_tpl->tpl_vars['user_profile_edit']->value) {?>
                            <div class="codo_notification codo_notification_success"><?php echo _t("user profile edits saved successfully");?>
</div>
                        <?php }?>
						
						
						<form action="<?php echo @constant('RURI');?>
user/profile/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/edit" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
						<span class="mdi mdi-checkbox-multiple-marked"></span>
						<div class="codo_edit_profile_title">
							<div class=""><span>Edit Profile</span></div>
							<div style="float: right" class="col-md-6">
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="codo_btn codo_btn_primary"><?php echo _t("Save Changes");?>
</button>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
						
						  <div class="col-xs-12 col-sm-6 col-md-8">
							
							
							
							
                            <div class="form-group form-group-profile-inner-div">
							
                                <label for="username" class="control-label profile-edit-label"><?php echo _t("username");?>
</label>
								<!--col-sm-8 -->
                                <div>
                                    <input type="text" name="username" class="codo_input codo_input_disabled" id="username"  value="<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
" disabled="">
                                </div>
                            </div>
                            <div class="form-group form-group-profile-inner-div">
                                <label for="display_name" class="control-label profile-edit-label"><?php echo _t("display name");?>
</label>
                                <div>
                                    <input type="text" name="name" class="codo_input" id="codo_display_name" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
">
                                </div>
                            </div>

                            

                            <div class="form-group form-group-profile-inner-div">
                                <label for="display_name" class="control-label profile-edit-label-normal"><?php echo _t("signature");?>
</label>
                                <div>
                                    <textarea name="signature" maxlength="<?php echo $_smarty_tpl->tpl_vars['signature_char_lim']->value;?>
" id="codo_signature_textarea" class="codo_input"><?php echo $_smarty_tpl->tpl_vars['user']->value->signature;?>
</textarea>
                                </div>
                                <span id="codo_countdown_signature_characters"><?php echo $_smarty_tpl->tpl_vars['signature_char_lim']->value;?>
</span>
                            </div>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_fields']->value, 'field');
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
$__foreach_field_0_saved = $_smarty_tpl->tpl_vars['field'];
?>


                                <div class="form-group form-group-profile-inner-div" id="custom_field_<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
">

                                    <?php if ($_smarty_tpl->tpl_vars['field']->value['title']) {?>
                                        <label class="control-label" for="<?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>
" ><?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>
</label>
                                    <?php }?>

                                    <div>

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

                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'radio') {?>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value['data']['options'], 'text');
foreach ($_from as $_smarty_tpl->tpl_vars['text']->value) {
$_smarty_tpl->tpl_vars['text']->_loop = true;
$__foreach_text_1_saved = $_smarty_tpl->tpl_vars['text'];
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
$_smarty_tpl->tpl_vars['text'] = $__foreach_text_1_saved;
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
$__foreach_text_2_saved = $_smarty_tpl->tpl_vars['text'];
?>

                                                        <option <?php if ($_smarty_tpl->tpl_vars['field']->value['def_val'] == $_smarty_tpl->tpl_vars['text']->value) {?>selected="selected"<?php }?>><?php ob_start();
echo $_smarty_tpl->tpl_vars['text']->value;
$_prefixVariable3=ob_get_clean();
echo _t($_prefixVariable3);?>
</option>
                                                    <?php
$_smarty_tpl->tpl_vars['text'] = $__foreach_text_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                                                </select>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type'] == 'checkbox') {?>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value['data']['options'], 'text');
foreach ($_from as $_smarty_tpl->tpl_vars['text']->value) {
$_smarty_tpl->tpl_vars['text']->_loop = true;
$__foreach_text_3_saved = $_smarty_tpl->tpl_vars['text'];
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
$_smarty_tpl->tpl_vars['text'] = $__foreach_text_3_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type'] == 'textarea') {?>

                                                <textarea <?php if ($_smarty_tpl->tpl_vars['field']->value['is_mandatory']) {?>required=""<?php }?> name="input_<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['field']->value['def_val'];?>
</textarea>
                                            <?php }?>
                                        <?php }?>                                    
                                    </div>

                                </div>
                            <?php
$_smarty_tpl->tpl_vars['field'] = $__foreach_field_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            <div id="codo_before_save_user_profile">
                            </div>

                            <!--<div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="codo_btn codo_btn_primary"><?php echo _t("Save edits");?>
</button>
                                </div>
                            </div>-->

                            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['CSRF_token']->value;?>
" />
                        
							
						  </div>
						  <div class="col-xs-6 col-md-4">
							
							<div class="form-group" style="margin-left:0px;">
                                <label for="display_name" class="control-label profile-edit-label-normal"><?php echo _t("Avatar");?>
</label>
                                <div class="codo_avatar">

                                    <img class="codo_avatar_img" draggable="false" src="<?php echo $_smarty_tpl->tpl_vars['user']->value->avatar;?>
" />
                                    <input class="codo_change_avatar" id="codo_avatar_file" type="file" name="avatar" />
                                    <div style="display: none" id="codo_new_avatar_selected_name"></div>
                                    <img class="codo_right_arrow" id="codo_right_arrow" src="<?php echo @constant('CURR_THEME');?>
img/arrow-right.jpg" />
                                    <img class="codo_avatar_preview" src="" id="codo_avatar_preview"/>
                                    <div class="codo_btn codo_btn_def col-xs-12 col-sm-6 col-md-8"><?php echo _t("Change");?>
</div>
                                    <div style="text-align: right;padding-top:5px;" class="col-xs-6 col-md-4"><span class="small text-muted">100x100</span></div>
                                </div>
                            </div>
							</form>
						
						  </div>
						</div>
						
                        

                        <?php echo smarty_modifier_load_block("block_profile_edit_details_end");?>


                    </div>
                    <?php echo smarty_modifier_load_block("block_profile_edit_details_after");?>


					<div class="codo_edit_profile">
					
                        <?php echo smarty_modifier_load_block("block_profile_change_pass_start");?>

                        <form class="form-horizontal" role="form">
						<div class="codo_edit_profile_title">
							<div class=""><span>Change Password</span></div>
							<div style="float: right"  class="col-md-6">
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button id="change_pass" type="submit" class="codo_btn codo_btn_primary"><?php echo _t("Change password");?>
</button>
										<span id="codo_pass_no_match_txt" class="codo_pass_no_match_txt"><?php echo _t("passwords do not match!");?>
</span>
									</div>
								</div>
							</div>
						</div>
						<br/>
						
                            <div class="form-group">
                                <div class="col-sm-12">
									<label for="curr_pass" class="control-label profile-edit-label"><?php echo _t("Current password");?>
</label>
                                    <input type="password" name="curr_pass" class="codo_input" id="curr_pass"  placeholder="<?php echo _t("Current password");?>
" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
									<label for="new_pass" class="control-label profile-edit-label"><?php echo _t("New password");?>
</label>
                                    <input type="password" name="new_pass" class="codo_input" id="new_pass"  placeholder="<?php echo _t("New password");?>
" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
									<label for="new_pass" class="control-label profile-edit-label"><?php echo _t("Confirm password");?>
</label>
                                    <input type="password" name="confirm_new_pass" class="codo_input" id="confirm_pass"  placeholder="<?php echo _t("Confirm password");?>
" required="">
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <div class="col-sm-12">
                                    <button id="change_pass" type="submit" class="codo_btn codo_btn_primary"><?php echo _t("Change password");?>
</button>
                                    <span id="codo_pass_no_match_txt" class="codo_pass_no_match_txt"><?php echo _t("passwords do not match!");?>
</span>
                                </div>
                            </div>-->
                        </form>
                        <?php echo smarty_modifier_load_block("block_profile_change_pass_end");?>

                    </div>
					
                </div>

				
            <div class="tab-pane fade" id="preferences">


                <div class="codo_edit_profile">
				
					<div class="codo_edit_profile_title">
						<div class=""><span>General</span></div>
					</div>
					<br/>
					
					<div class="codo-preferences-container">
                    <form class="form-horizontal" id="codo_form_user_preferences">
                        <fieldset> 
                            <!--<legend><?php echo _t("General");?>
</legend>-->
							
                            <div class="form-group" style="margin-left:0px;margin-right:0px;">
                                <label for="frequency" class="profile-edit-label"><?php echo _t("Notification frequency");?>
</label>
                                <div class="">
                                    <select id="codo_notification_frequency" class="form-control">
                                        <option value="immediate" <?php echo smarty_function_match_option(array('key'=>'notification_frequency','value'=>'immediate'),$_smarty_tpl);?>
><?php echo _t("Immediate");?>
</option>
                                        <option value="daily" <?php echo smarty_function_match_option(array('key'=>'notification_frequency','value'=>'daily'),$_smarty_tpl);?>
><?php echo _t("Daily digest");?>
</option>
                                        <option value="weekly" <?php echo smarty_function_match_option(array('key'=>'notification_frequency','value'=>'weekly'),$_smarty_tpl);?>
><?php echo _t("Weekly digest");?>
</option>                                    
                                    </select>
                                </div> 
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-4 profile-edit-label"><?php echo _t("Show real-time notifications");?>
</label>
                                <div class="col-sm-6">
                                    <!--<div id="real_time_notifications" class="codo_switch <?php echo smarty_function_match_switch(array('key'=>'real_time_notifications','value'=>'yes'),$_smarty_tpl);?>
" style="margin-top: 6px">
                                        <div class="codo_switch_toggle"></div>
                                        <span class="codo_switch_on"><?php echo _t('Yes');?>
</span>
                                        <span class="codo_switch_off"><?php echo _t('No');?>
</span>
                                    </div>-->
									
									<div class="codo-radio-btn">
										<ul>
										  <li>
											<input type="radio" id="f-option" name="real_time_notifications">
											<label for="f-option">Yes</label>
											
											<div class="check"></div>
										  </li>
										  
										  <li>
											<input type="radio" id="s-option" name="real_time_notifications">
											<label for="s-option">No</label>
											
											<div class="check"><div class="inside"></div></div>
										  </li>
										</ul>
									</div>
									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 profile-edit-label"><?php echo _t("Show desktop notifications");?>
</label>
                                <div class="col-sm-6">
                                    <!--<div id="desktop_notifications" class="codo_switch <?php echo smarty_function_match_switch(array('key'=>'desktop_notifications','value'=>'yes'),$_smarty_tpl);?>
" style="margin-top: 6px">
                                        <div class="codo_switch_toggle"></div>
                                        <span class="codo_switch_on"><?php echo _t('Yes');?>
</span>
                                        <span class="codo_switch_off"><?php echo _t('No');?>
</span>
                                    </div>-->
									<div class="codo-radio-btn">
										<ul>
										  <li>
											<input type="radio" id="f-option2" name="desktop_notifications">
											<label for="f-option2">Yes</label>
											
											<div class="check"></div>
										  </li>
										  
										  <li>
											<input type="radio" id="s-option2" name="desktop_notifications">
											<label for="s-option2">No</label>
											
											<div class="check"><div class="inside"></div></div>
										  </li>
										</ul>
									</div>
                                </div>
                            </div>
					</div>
							
							<div class="codo_edit_profile_title">
							<div class=""><span>Notification level</span></div>
							</div>
						
					<div class="codo-preferences-container">	
                            <!--<legend><?php echo _t("Notification level");?>
</legend>-->
                            <div class="form-group">
                                <label class="control-label profile-edit-label-normal"><?php echo _t("When I create a topic");?>
</label>
                                <div class="col-xs-12" style="height:120px;">
                                    <?php $_smarty_tpl->_assignInScope('id', '1');
?>
                                    <?php $_smarty_tpl->_assignInScope('my_subscription_type', smarty_modifier_get_preference('notification_type_on_create_topic'));
?>
                                    <?php $_smarty_tpl->_subTemplateRender("file:forum/notification_level.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label profile-edit-label-normal"><?php echo _t("When I reply a topic");?>
</label>
                                <div class="col-xs-12" style="height:120px;">

                                    <?php $_smarty_tpl->_assignInScope('id', '2');
?>                                    
                                    <?php $_smarty_tpl->_assignInScope('my_subscription_type', smarty_modifier_get_preference('notification_type_on_reply_topic'));
?>                                    
                                    <?php $_smarty_tpl->_subTemplateRender("file:forum/notification_level.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                </div>
                            </div>

                            <br/><br/>    
                            <div class="form-group">
                                <div class="col-sm-7">
                                    <button id="codo_update_preferences" type="submit" class="codo_btn codo_btn_primary"><?php echo _t("Update preferences");?>
</button>
                                    <span style="display: none" class="codo_load_more_bar_blue_gif"></span>
                                </div>
                            </div>                                
                        </fieldset>
                    </form>
					</div>
                </div>
            </div>

            <div class="tab-pane fade" id="subscriptions">

                <div class="codo_edit_profile">
                    <fieldset>
						<div class="codo_edit_profile_title">
							<div class=""><span>Categories</span></div>
						</div>
                        <!--<legend><?php echo _t("Categories");?>
</legend>-->
                        <?php $_smarty_tpl->_assignInScope('is_category', 'yes');
?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'cat');
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
$__foreach_cat_4_saved = $_smarty_tpl->tpl_vars['cat'];
?>

                            <div class="codo_subscription col-sm-12">
                                <div class="col-sm-4">
                                    <div class="codo_subscription_img">
                                        <img draggable="false" src="<?php echo @constant('DURI');
echo @constant('CAT_IMGS');
echo $_smarty_tpl->tpl_vars['cat']->value['cat_img'];?>
" />
                                    </div>

                                    <a href="<?php echo @constant('RURI');?>
topics/<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_alias'];?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_name'];?>

                                    </a>
                                </div>
                                <div class="col-sm-8">
                                    <?php $_smarty_tpl->_assignInScope('my_subscription_type', $_smarty_tpl->tpl_vars['cat']->value['type']);
?>
                                    <?php $_smarty_tpl->_subTemplateRender("file:forum/notification_level.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                </div>
                            </div>
                        <?php
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_4_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                        <!--<div class='col-md-12' style='height: 3em'></div>
                        <legend><?php echo _t("Topics");?>
</legend>-->
						<div class="codo_edit_profile_title" style="clear:both;">
							<div class=""><span>Topics</span></div>
						</div>
                        <?php $_smarty_tpl->_assignInScope('is_category', 'no');
?>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['topics']->value, 'topic');
foreach ($_from as $_smarty_tpl->tpl_vars['topic']->value) {
$_smarty_tpl->tpl_vars['topic']->_loop = true;
$__foreach_topic_5_saved = $_smarty_tpl->tpl_vars['topic'];
?>

                            <?php $_smarty_tpl->_assignInScope('avatar', ((string)@constant('DURI')).((string)@constant('PROFILE_IMG_PATH')).((string)$_smarty_tpl->tpl_vars['topic']->value['avatar']));
?>

                            <?php if ($_smarty_tpl->tpl_vars['avatar']->value == null) {?>

                                <?php $_smarty_tpl->_assignInScope('avatar', ((string)@constant('DURI')).((string)@constant('DEF_AVATAR')));
?>
                            <?php }?>

                            <div class="codo_subscription col-sm-12">
                                <div class="col-sm-4">
                                    <div class="codo_subscription_img">
                                        <a href="<?php echo @constant('RURI');?>
user/profile/<?php echo $_smarty_tpl->tpl_vars['topic']->value['id'];?>
">
                                            <img draggable="false" src="<?php echo $_smarty_tpl->tpl_vars['avatar']->value;?>
" />
                                        </a>
                                    </div>

                                    <a href="<?php echo @constant('RURI');?>
topic/<?php echo $_smarty_tpl->tpl_vars['topic']->value['tid'];?>
/" class="codo_subscription_a_style"><?php echo $_smarty_tpl->tpl_vars['topic']->value['title'];?>
</a>   
                                </div>
                                <div class="col-sm-7">
                                    <?php $_smarty_tpl->_assignInScope('my_subscription_type', $_smarty_tpl->tpl_vars['topic']->value['type']);
?>
                                    <?php $_smarty_tpl->_subTemplateRender("file:forum/notification_level.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                </div>
                            </div>

                        <?php
$_smarty_tpl->tpl_vars['topic'] = $__foreach_topic_5_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </fieldset>
                </div>
            </div>
            <div class="tab-pane fade" id="notifications">

                <div class='codo_edit_profile'>
                    <div id='codo_all_notifications'>

                    </div>
                </div>
            </div>				
				
        </div>			
								<!--admin profile-->
            <div class="col-md-3 profile-user-statistics-right">

                <div class="codo_profile profile-user-statistics-right-inner" id="">

                    <div class="codo_user_statistics">


                        <div class="row codo_info_block">
                            <!--<div class="codo_blue_dot">

                            </div>
                            <div class="codo_user_info_label">
							
                                <?php echo _t("views");?>

                            </div>-->
							<div class="col-md-6 codo_profile_left" style="margin-top: 2px">
							<i class="icon icon-eye2" style="font-size: 22px;color:#00b147;"></i>
							</div>
                            <div class="col-md-6 codo_user_info_num codo_profile_right">
                                <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['user']->value->profile_views);?>

                            </div>
                        </div>
                        <div class="row codo_info_block">
                            <!--<div class="codo_red_dot">

                            </div>
                            <div class="codo_user_info_label">
							
                                <?php echo _t("posts");?>

                            </div>-->
							<div class="col-md-6 codo_profile_left" style="margin-top: 2px">
							<i class="icon icon-message" style="font-size: 22px;color:#0097f6;"></i>
							</div>
                            <div class="col-md-6 codo_user_info_num codo_profile_right">
                                <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['user']->value->no_posts);?>

                            </div>
                        </div>
                        <div class="row codo_info_block">
                            <!--<div class="codo_green_dot">

                            </div>
                            <div class="codo_user_info_label">
							
                                <?php echo _t("reputation");?>

                            </div>-->
							<div class="col-md-6 codo_profile_left" style="margin-top: 2px">
							<i class="glyphicon glyphicon-star" style="font-size: 22px;color:#5a7fee;"></i>
							</div>
                            <div class="codo_user_info_num col-md-6 codo_profile_right">
                                <?php echo $_smarty_tpl->tpl_vars['user']->value->reputation;?>

                            </div>
                        </div>

                    </div>
                    <div class="codo_user_details">

                        <div style="color:#9f9f9f;"> <?php echo _t("Joined :");?>
 <span style="float:right;color:#3e3e3e;font-weight:bold"><?php echo smarty_modifier_get_pretty_time($_smarty_tpl->tpl_vars['user']->value->created);?>
</span>
                        </div>
                        <div style="color:#9f9f9f;">
                            <?php echo _t("Last login :");?>
 <span style="float:right;color:#3e3e3e;font-weight:bold"><?php if ($_smarty_tpl->tpl_vars['user']->value->last_access == 0) {
echo _t('never');
} else {
echo smarty_modifier_get_pretty_time($_smarty_tpl->tpl_vars['user']->value->last_access);
}?></span>
                        </div>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_fields']->value, 'field');
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
$__foreach_field_6_saved = $_smarty_tpl->tpl_vars['field'];
?>
                        
                            <?php echo $_smarty_tpl->tpl_vars['field']->value['output'];?>

                        <?php
$_smarty_tpl->tpl_vars['field'] = $__foreach_field_6_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                    </div>

                </div>			

            </div>


        </div>
    </div>           


    <?php echo '<script'; ?>
 type="text/javascript">

        CODOFVAR = {
            signature_char_limit: '<?php echo $_smarty_tpl->tpl_vars['signature_char_lim']->value;?>
',
            lim_notifications: 20,
            trans: {
                preferences: {
                    title: "<?php echo _t('Preferences');?>
", text: "<?php echo _t('Your preferences have been successfully saved');?>
"
                },
                subscriptions: {
                    title: "<?php echo _t('Subscriptions');?>
", text: "<?php echo _t('Subscription updated successfully');?>
"
                }
            }
        };

    <?php echo '</script'; ?>
>
<?php
$_smarty_tpl->ext->_inheritance->blockNesting--;
}
}
/* {/block 'body'} */
}
