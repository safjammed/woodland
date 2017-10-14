<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:45:07
  from "C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\user\profile\view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e17a33677bf2_93436097',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7faa0a83ee77ec9eb6e1ef13e6a3054e0e30138' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\sites\\default\\themes\\2k18\\templates\\user\\profile\\view.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_59e17a33677bf2_93436097 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_load_block')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.load_block.php';
if (!is_callable('smarty_modifier_abbrev_no')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.abbrev_no.php';
if (!is_callable('smarty_modifier_get_pretty_time')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.get_pretty_time.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
new Block_body_2215159e17a3366c6d0_48402081($_smarty_tpl);
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\user\profile\view.tpl */
class Block_body_2215159e17a3366c6d0_48402081 extends Smarty_Internal_Block
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
                <div class="codo_username col-md-6 codo-username-profile">
					<h4><?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</h4>
					<p>
					<?php echo _t("Post all your questions and problems related to codoforum here.");?>

					</p>
				</div> 
			</div>
			<hr align="left" style="width:65%;"/>
			<div class="row nav-main-profile">
				<div id="overview" class="col-md-1 nav-box-profile nav-box-profile-active">
					<span class="nav-text-profile"><?php echo _t("Overview");?>
</span>
				</div>
				<div class="col-md-2 nav-box-profile" id="codo_messenger" style="display:none;width:150px">
					<span class="nav-text-profile" id="codo_pms"><?php echo _t("Private messenger");?>
</span>
				</div>
				<div class="col-md-2 nav-box-profile">
					<span class="nav-text-profile" id="codo_edit_profile"><?php echo _t("Edit Account");?>
</span>
				</div>
                                
			</div>
		</div>
	</div>
	
    <div class="container" style="padding-top: 0px">
        <?php echo smarty_modifier_load_block("block_profile_view_before");?>

        <div style="display:none" class="codo_notification codo_notification_error" id="codo_resend_mail_failed"></div>

        <div style="display:none" id="codo_mail_resent" class="codo_notification codo_notification_success">
            <?php echo _t("A confirmation email has been sent to your email address!");?>

        </div>


        <?php if ($_smarty_tpl->tpl_vars['user_not_confirmed']->value) {?>

            <div class="codo_notification codo_notification_warning">
                <?php echo _t("You have not yet confirmed your email address.");?>

                <a id="codo_resend_mail" href="#"><?php echo _t("Resend email");?>
</a>
                <img id="codo_email_sending_img" src="<?php echo @constant('CURR_THEME');?>
img/ajax-loader-orange.gif" />
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['user_not_approved']->value) {?>

            <div class="codo_notification codo_notification_warning">
                <?php echo _t("Your account is awaiting approval.");?>

            </div>
        <?php }?>
		
        <div class="row">
			
			

            <div class="col-md-8">

                <div class="codo_tabs">

                    <!--<ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a data-toggle="tab" href="#recent_posts">Recent posts</a></li>
                    </ul>-->

                    <div class="codo_tabs_content tab-content">

                        <div id="recent_posts" class="tab-pane fade in active codo_topics_body">

                            
                                <div class='codo_load_more_gif'></div>

                                <?php echo '<script'; ?>
 style="display: none" id="codo_template" type="text/html">


                                    {{#each topics}}
                                    <article class="clearfix">

                                        <!--<div class="codo_topics_topic_img">
                                            <a href="{{../RURI}}category/{{cat_alias}}">
                                                <img draggable="false" src="{{../DURI}}{{../CAT_IMGS}}{{cat_img}}" />
                                            </a>
                                        </div>-->
										
										<div class="row" style="position:absolute;top: 10px;right: 0;width:120px;">
			
											<div class="col-md-5" style="padding-left:0px;padding-right:0px;float:right;">
                                                                                                <div style="float:left;padding-top:2px;" style="float:left;">
                                                                                                    <i class="icon icon-message" style="font-size:16px;color:#0097f6;"></i>
                                                                                                </div>
												<div style="float:left;font-weight:bold;padding-left:3px;">
												<span>{{no_replies}}</span>
												</div>
											</div>
											<div class="col-md-5" style="padding-left:0px;padding-right:0px;float:right;" id="codo_topics_no_views">
                                                                                                <div style="float:left;padding-top:2px;" style="float:left;">
                                                                                                    <i class="icon icon-eye2" style="font-size:16px;color:#00b147;"></i>
                                                                                                </div>
												<div style="float:left;font-weight:bold;padding-left:3px;">
												{{no_views}}
												</div>
											</div>
											
											
										</div>

                                        <div class="codo_topics_topic_content">
                                            <div class="codo_topics_topic_avatar">
                                                <a href="{{../RURI}}user/profile/{{id}}">

                                                    {{#if avatar}}
                                                    <img draggable="false" src="{{avatar}}" />
                                                    {{else}}
                                                    <img draggable="false" src="{{../../DURI}}{{../../DEF_AVATAR}}" />
                                                    {{/if}}

                                                </a>
                                            </div>
											
											<div class="codo_topics_topic_title"><a href="{{../RURI}}topic/{{topic_id}}/{{{safe_title}}}"style="font-size:16px;color:#000;">{{{title}}}</a></div>
											

                                            

                                        </div>

                                        {{#each contents}}
                                        <div class='codo_topics_topic_contents'>
                                            <div class="codo_topics_topic_message">{{{message}}}
                                            </div>
                                            <div class='codo_virtual_space'></div>    
                                            <div class="codo_topics_last_post">
                                                <a href="{{../../RURI}}topic/{{../topic_id}}/{{../safe_title}}/post-{{post_id}}#post-{{post_id}}">{{post_created}}</a>
                                            </div>
                                        </div>
                                        {{/each}}
										
										<!--<div class="codo_topics_topic_name">
                                            <a href="{{../RURI}}user/profile/{{id}}"><span class="role_{{role}}">{{name}}</span></a>
                                            <span>{{../created}} {{topic_created}}</span>
                                        </div>-->

                                        <!--<div class="codo_topics_topic_foot clearfix">

                                            <div class="codo_topics_no_replies"><span>{{no_replies}}</span>{{../reply_txt}}</div>
                                            <div class="codo_topics_no_replies"><span>{{no_views}}</span>{{../views_txt}}</div>

                                        </div>-->

									<br/>
									<br/>
                                    </article>
                                    {{else}}

                                    <div class="codo_no_posts">
                                        {{no_topics}}
                                        {{#if can_create}}
                                        <br/><br/>
                                        <button class="codo_btn codo_btn_primary" onclick="codo_create_topic()" href="#" >{{new_topic}}</button> 
                                        {{/if}}
                                    </div>
                                    {{/each}}
                                    <?php echo '</script'; ?>
>

                                
                            </div>

                            <?php echo smarty_modifier_load_block("block_profile_view_tabs_after");?>


                        </div>
                    </div>
                </div>
				
				
				<!--admin profile-->
            <div class="col-md-4 profile-user-statistics-right">

                <div class="codo_profile profile-user-statistics-right-inner" id="">

                    <!--<div class="codo_user">

                        <div class="codo_user_header">

                            <span><?php echo _t("Profile");?>
</span>
                            <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>

                                <i id="codo_edit_profile" class="icon-edit"></i>
                            <?php }?>

                        </div>

                        <div class="codo_user_body">
                            <div>
                                <img draggable="false" src="<?php echo $_smarty_tpl->tpl_vars['user']->value->avatar;?>
" />
                                <div class="codo_username"><?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</div>

                            </div>
                        </div>
                    </div>-->

                    <div class="codo_user_statistics">


                        <div class="row codo_info_block">
                            <!--<div class="codo_blue_dot">

                            </div>
                            <div class="codo_user_info_label">
							
                                <?php echo _t("views");?>

                            </div>-->
							<div class="col-md-6 codo_profile_left">
							<i class="material-icons" style="color:#00b147;">visibility</i>
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
							<div class="col-md-6 codo_profile_left">
							<i class="material-icons" style="color:#0097f6;">chat_bubble</i>
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
							<div class="col-md-6 codo_profile_left">
							<i class="material-icons" style="color:#5a7fee;">stars</i>
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
$__foreach_field_0_saved = $_smarty_tpl->tpl_vars['field'];
?>
                        
                            <?php echo $_smarty_tpl->tpl_vars['field']->value['output'];?>

                        <?php
$_smarty_tpl->tpl_vars['field'] = $__foreach_field_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                    </div>

                </div>
            </div>
			
			<!--end admin profile-->
				
				
            </div>


            <?php echo '<script'; ?>
 type="text/javascript">

                CODOFVAR = {
                userid: <?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
,
                tab: '<?php echo $_smarty_tpl->tpl_vars['tab']->value;?>
'
                }
            <?php echo '</script'; ?>
>
        <?php
$_smarty_tpl->ext->_inheritance->blockNesting--;
}
}
/* {/block 'body'} */
}
