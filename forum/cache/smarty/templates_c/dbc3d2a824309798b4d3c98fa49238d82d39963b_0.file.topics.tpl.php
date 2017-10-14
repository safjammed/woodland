<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:42:25
  from "C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\forum\topics.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e179912f1f42_74332609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dbc3d2a824309798b4d3c98fa49238d82d39963b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\sites\\default\\themes\\2k18\\templates\\forum\\topics.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_59e179912f1f42_74332609 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_load_block')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.load_block.php';
if (!is_callable('smarty_modifier_abbrev_no')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.abbrev_no.php';
if (!is_callable('smarty_function_get_children')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\function.get_children.php';
if (!is_callable('smarty_function_print_children')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\function.print_children.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
new Block_body_2574359e179912df037_17244905($_smarty_tpl);
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\forum\topics.tpl */
class Block_body_2574359e179912df037_17244905 extends Smarty_Internal_Block
{
public $name = 'body';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->blockNesting++;
?>


    <input type="hidden" id="page_sort_option" value="newest"/>
    <div class="container" id="codo_topics_row">

        <div class="row">

            <div>
                <?php echo smarty_modifier_load_block("block_catgory_list_before");?>


                <!--all topics -->
                <div class="codo_topics col-md-8 clearfix">

                    <?php echo smarty_modifier_load_block("block_all_topics_before");?>


                    <?php if ($_smarty_tpl->tpl_vars['I']->value->loggedIn() && $_smarty_tpl->tpl_vars['canCreateTopicInAtleastOneCategory']->value) {?>

                        <div class="codo_topics_head hidden-xs">

                            <div class="codo_topics_start_button_div">
                                <a class="btn btn-default codo_topics_start_button" href="#" role="button" onclick="codo_create_topic()"><?php echo _t("Start New Topic");?>
</a>
                            </div>
                        </div>
                    <?php }?>
                    <div class="codo_topics_body" id="codo_topics_body">

                        <?php if ($_smarty_tpl->tpl_vars['total_num_topics']->value > 0) {?>
                            <?php echo $_smarty_tpl->tpl_vars['topics']->value;?>

                        <?php } else { ?>
                            <div class="codo_zero_topics">
                                <?php echo _t("No topics created yet!");?>
<br/><br/>
                                <?php echo _t("Be the first to");?>
 <a href="<?php echo @constant('RURI');?>
new_topic"><?php echo _t("create");?>
</a> <?php echo _t("a topic");?>

                            </div>
                        <?php }?>
                    </div>



                    <span style="display: none">
                        
                        <div id="codo_topic_page_info">
                            <span id="codo_page_info_time_spent" data-toggle="tooltip" title="<?php echo _t("time spent reading previous page");?>
"></span>
                            <span id="codo_page_info_page_no" data-toggle="tooltip" title="<?php echo _t("page no.");?>
"></span>
                            <span id="codo_page_info_pages_to_go" data-toggle="tooltip" title="<?php echo _t("pages to go");?>
"></span>
                        </div>
                    </span>
                </div>
                <!--end all topics -->

                <div class="codo_categories col-md-4" id="codo_categories_sidebar">

                    <div class="row" id="codo_category_all_topics" style="border-bottom:1px solid #eee;">

                        <div class="codo_categories_category col-md-12">
                            <!--<i class="icon-arrow-up"></i>-->
                            <div class="codo_category_title_header"><?php echo _t("Categories");?>
</div>
                            <!--<?php if (isset($_smarty_tpl->tpl_vars['new_topics']->value) && count($_smarty_tpl->tpl_vars['new_topics']->value)) {?>
                                <div id="codo_mark_all_read" class="codo_btn codo_mark_all_read"><?php echo _t('Mark all as read');?>
</div>
                            <?php }?>
                            <span class="codo_category_num_topics"><?php echo $_smarty_tpl->tpl_vars['total_num_topics']->value;?>
</span>-->
                            </div>
                        </div>

                        <ul id="codo_categories_ul">

                            <!--<div class="row active" id="codo_category_all_topics">
                                    <div class="codo_categories_category col-md-12">
                                            <div class="codo_category_title"></div>
                            <?php if (isset($_smarty_tpl->tpl_vars['new_topics']->value) && count($_smarty_tpl->tpl_vars['new_topics']->value)) {?>
                                    <div id="codo_mark_all_read" class="codo_btn codo_mark_all_read"><?php echo _t('Mark all as read');?>
</div>
                            <?php }?>
                            <span class="codo_category_num_topics"><?php echo $_smarty_tpl->tpl_vars['total_num_topics']->value;?>
</span>
                    </div>
            </div>-->

                            <li>
                                <div class="row">

                                    <div class="codo_categories_category col-md-11 col-xs-11">
                                        <a href="#">
                                            <div style="padding-left: 25px" class="codo_category_title codo_category_title_active"><?php echo _t("All topics");?>
</div>
                                        </a>
                                        <span data-toggle="tooltip" data-placement="bottom" title="<?php echo _t('No. of topics');?>
" class="codo_category_num_topics codo_bs_tooltip">
                                            <?php echo $_smarty_tpl->tpl_vars['total_num_topics']->value;?>

                                        </span>
                                    </div>
                                </div>                                
                            </li>



                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cats']->value, 'cat');
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
$__foreach_cat_0_saved = $_smarty_tpl->tpl_vars['cat'];
?>
                                <li>
                                    <div class="row">

                                        <div class="codo_categories_category col-md-11 col-xs-11">
                                            <a href="<?php echo @constant('RURI');?>
category/<?php echo rawurlencode($_smarty_tpl->tpl_vars['cat']->value->cat_alias);?>
">
                                                <div class="codo_category_title"><?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_name;?>
</div>
                                            </a>
                                            <span data-toggle="tooltip" data-placement="bottom" title="<?php echo _t('No. of topics');?>
" class="codo_category_num_topics codo_bs_tooltip">
                                                <?php if ($_smarty_tpl->tpl_vars['cat']->value->granted == 1) {?>
                                                    <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['cat']->value->no_topics);?>

                                                <?php } else { ?> - 
                                                <?php }?>
                                            </span>

                                            
                                        </div>

                                        <?php if ($_smarty_tpl->tpl_vars['cat']->value->show_children == 0) {?>
                                            <div class="codo_category_toggle col-md-1 col-xs-1"><i class="icon-arrow-down"></i></div>
                                            <?php }?>

                                    </div>
                                    <?php echo smarty_function_get_children(array('cat'=>$_smarty_tpl->tpl_vars['cat']->value,'new_topics'=>$_smarty_tpl->tpl_vars['new_topics']->value),$_smarty_tpl);?>

                                </li>
                            <?php
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                        </ul>
                        <?php echo smarty_modifier_load_block("block_catgory_list_after");?>
 

                        <div class="codo_sidebar_fixed">

                            <?php if ($_smarty_tpl->tpl_vars['can_search']->value) {?>
                                <div id="codo_sidebar_fixed_search" class="codo_sidebar_search codo_sidebar_fixed_els">
                                    <input type="text" placeholder="<?php echo _t('Search');?>
" class="form-control codo_topics_search_input" />
                                    <i class="glyphicon glyphicon-search codo_topics_search_icon" title="Advanced search" ></i>
                                </div>
                            <?php }?>

                            <div class="dropdown codo_sidebar_navigation codo_sidebar_fixed_els" id="codo_category_select">
                                <button value="" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                    <span><?php echo _t("All topics");?>
</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cats']->value, 'cat');
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
$__foreach_cat_1_saved = $_smarty_tpl->tpl_vars['cat'];
?>

                                        <li role="presentation"><a data-alias="<?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_alias;?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_name;?>
</a></li>

                                        <?php echo smarty_function_print_children(array('cat'=>$_smarty_tpl->tpl_vars['cat']->value),$_smarty_tpl);?>

                                    <?php
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                                </ul>
                            </div>

                            <div class="codo_sidebar_settings">

                                <div style="border-bottom:1px solid #eee;margin:0;height:50px;">

                                    <div class="codo_categories_category col-md-12">

                                        <div class="codo_category_title" style="margin-top:15px;"><?php echo _t("Actions");?>
</div>

                                    </div>
                                </div>

                                <div>
                                    <div class="codo_switch">
                                        <!--<div class="codo_switch_toggle"></div>-->
                                        <input type="checkbox" name="group1" id="codo_sidebar_hide_msg_switch" class="chk-box codo_switch codo_switch_off">
                                        <label for="codo_sidebar_hide_msg_switch"></label>
    <!--<span class="codo_switch_on"><?php echo _t('Yes');?>
</span>
    <span class="codo_switch_off"><?php echo _t('No');?>
</span>-->
                                    </div>
                                    <span><?php echo _t("Hide topic messages");?>
</span>                                
                                </div>

                                <div>
                                    <div class="codo_switch">
                                        <!--<div class="codo_switch_toggle"></div>
                                        <span class="codo_switch_on"><?php echo _t('Yes');?>
</span>
                                        <span class="codo_switch_off"><?php echo _t('No');?>
</span>-->
                                        <input type="checkbox" name="group1" id="codo_sidebar_inf_scroll_switch" class="chk-box codo_switch codo_switch_off">
                                        <label for="codo_sidebar_inf_scroll_switch"></label>
                                    </div>
                                    <span><?php echo _t("Enable infinite scrolling");?>
</span>                                                            
                                </div>

                            </div>    

                        </div>

                    </div>



                    <div id='codo_delete_topic_confirm_html'>
                        <div class='codo_posts_topic_delete'>
                            <div class='codo_content'>
                                <?php echo _t("All posts under this topic will be ");?>
<b><?php echo _t("deleted");?>
</b> ?
                                <br/>

                                <div class="codo_consider_as_spam codo_spam_checkbox">
                                    <input id="codo_spam_checkbox" name="spam" type="checkbox" checked="">
                                    <label class="codo_spam_checkbox" for="spam"><?php echo _t('Mark as spam');?>
</label>
                                </div>
                            </div>

                            <div class="codo_modal_footer">
                                <div class="codo_btn codo_btn_def codo_modal_delete_topic_cancel"><?php echo _t("Cancel");?>
</div>
                                <div class="codo_btn codo_btn_primary codo_modal_delete_topic_submit"><?php echo _t("Delete");?>
</div>
                            </div>
                            <div class="codo_spinner"></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <?php if (!$_smarty_tpl->tpl_vars['load_more_hidden']->value) {?>
        <div class="codo_topics_loadmore_div row" id="codo_topics_load_more">

                <style type="text/css">
                    .CODOFORUM {

                        padding-bottom: 150px !important;                        
                    }
                </style>
                <div onclick="CODOF.changePage(this, <?php echo $_smarty_tpl->tpl_vars['curr_page']->value;?>
, 'prev')" class="pagination_previous_page col-md-offset-1 col-md-2 col-sm-12<?php if ($_smarty_tpl->tpl_vars['curr_page']->value != 1) {?> active_page_controls<?php }?>">

                    <i class="icon icon-arrow-left"></i>
                    <div><?php echo _t("Previous");?>
</div>
                </div>

                <div class="col-md-4 pagination_pages col-sm-12">
                    <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

                </div>

                <div  onclick="CODOF.changePage(this, <?php echo $_smarty_tpl->tpl_vars['curr_page']->value;?>
, 'next')" class="pagination_next_page col-md-2 col-sm-12<?php if ($_smarty_tpl->tpl_vars['curr_page']->value != $_smarty_tpl->tpl_vars['total_pages']->value) {?> active_page_controls<?php }?>">

                    <div><?php echo _t("Next");?>
</div>
                    <i class="icon icon-arrow-right"></i>
                </div>

                <?php if ($_smarty_tpl->tpl_vars['can_create_topic']->value) {?>
                    <div class="pagination_new_topic col-md-2 col-sm-12">
                        <button id="codo_create_topic_btn" onclick="codo_create_topic()" type="submit" class="codo_btn codo_btn_primary"><?php echo _t("Create new topic");?>
</button>
                    </div>
                <?php }?>
                <div class="col-md-offset-1"></div>

        </div>                            
        <?php }?>


        <div id="codo_topics_multiselect" class="codo_topics_multiselect">

            <?php ob_start();
echo _t("With");
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
 <span id="codo_number_selected"></span> <?php ob_start();
echo _t("selected");
$_prefixVariable2=ob_get_clean();
echo $_prefixVariable2;?>
 
            <span class="codo_multiselect_deselect codo_btn codo_btn_sm codo_btn_def" id="codo_multiselect_deselect"><?php ob_start();
echo _t("deselect topics");
$_prefixVariable3=ob_get_clean();
echo $_prefixVariable3;?>
</span>
            <select class="form-control" id="codo_topics_multiselect_select">
                <option value="nothing"><?php ob_start();
echo _t("Select action");
$_prefixVariable4=ob_get_clean();
echo $_prefixVariable4;?>
</option>
                <optgroup label="<?php ob_start();
echo _t("Actions");
$_prefixVariable5=ob_get_clean();
echo $_prefixVariable5;?>
">
                    <?php if ($_smarty_tpl->tpl_vars['can_delete']->value) {?>
                        <option value="delete"><?php ob_start();
echo _t("Delete topics");
$_prefixVariable6=ob_get_clean();
echo $_prefixVariable6;?>
</option>    
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['can_merge']->value) {?>
                        <option disabled value="merge"><?php ob_start();
echo _t("Merge topics");
$_prefixVariable7=ob_get_clean();
echo $_prefixVariable7;?>
</option>    
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['can_move']->value) {?>
                        <option value="move"><?php ob_start();
echo _t("Move topics");
$_prefixVariable8=ob_get_clean();
echo $_prefixVariable8;?>
</option>    
                    <?php }?>
                </optgroup>

            </select>
        </div>
        <div class="modal fade" id='codo_multiselect_delete'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"><?php echo _t("Delete topics");?>
</h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo _t("Are you sure you want to delete the following topics including its replies ?");?>
</p>

                        <p>
                        <div id="codo_multiselect_delete_links"></div>
                        </p>

                    </div>
                    <div class="modal-footer">
                        <div class="codo_loading"></div>                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Cancel");?>
</button>
                        <button onclick="multiselect.delete_topics()" type="button" class="btn btn-primary"><?php echo _t("Delete");?>
</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id='codo_multiselect_merge'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"><?php echo _t("Merge topics");?>
</h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo _t("Are you sure you want to merge the following topics ?");?>
</p>

                        <p>
                        <div id="codo_multiselect_merge_links"></div>
                        </p>

                        <p class=""><?php echo _t("Select the destination topic from above, where all topics will be merged");?>
</p>

                    </div>
                    <div class="modal-footer">
                        <div class="codo_loading"></div>                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Cancel");?>
</button>
                        <button onclick="multiselect.merge_topics()" type="button" class="btn btn-primary"><?php echo _t("Merge");?>
</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id='codo_multiselect_move'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"><?php echo _t("Move topics");?>
</h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo _t("The selected topics will be moved to");?>
</p>

                        <p>

                            <select class="form-control" id="codo_multiselect_move_category_select"> 
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cats']->value, 'cat');
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
$__foreach_cat_2_saved = $_smarty_tpl->tpl_vars['cat'];
?>

                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_id;?>
" role="presentation"><?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_name;?>
</option>

                                    <?php echo smarty_function_print_children(array('cat'=>$_smarty_tpl->tpl_vars['cat']->value,'el'=>'option'),$_smarty_tpl);?>

                                <?php
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </select>
                        </p>


                    </div>
                    <div class="modal-footer">
                        <div class="codo_loading"></div>                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Cancel");?>
</button>
                        <button onclick="multiselect.move_topics()" type="button" class="btn btn-primary"><?php echo _t("Move");?>
</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <div class="modal fade" id='codo_report_topic'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"><?php echo _t("Report topic");?>
</h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo _t("Why are you reporting this topic ?");?>
</p>

                        <p>

                            <select class="form-control" id="codo_report_select"> 
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['report_types']->value, 'report');
foreach ($_from as $_smarty_tpl->tpl_vars['report']->value) {
$_smarty_tpl->tpl_vars['report']->_loop = true;
$__foreach_report_3_saved = $_smarty_tpl->tpl_vars['report'];
?>

                                    <option value="<?php echo $_smarty_tpl->tpl_vars['report']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['report']->value['name'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['report'] = $__foreach_report_3_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>    
                            </select>
                        </p>

                        <p style="display: none" id="report_reason">                            
                            <input id="report_details" class="form-control" type="text" placeholder="<?php echo _t("provide your reason");?>
" />
                        </p>


                    </div>
                    <div class="modal-footer">
                        <div class="codo_loading" style="right: 168px;"></div>                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Cancel");?>
</button>
                        <button onclick="CODOF.report_topic()" type="button" class="btn btn-primary"><?php echo _t("Report");?>
</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <?php echo '<script'; ?>
 type="text/javascript">

            CODOFVAR = {
                no_more_posts: '<?php echo _t("No more topics to display!");?>
',
                no_posts: '<?php echo _t("No topics found matching your criteria!");?>
',
                subcategory_dropdown: '<?php echo $_smarty_tpl->tpl_vars['subcategory_dropdown']->value;?>
',
                num_posts_per_page: '<?php echo $_smarty_tpl->tpl_vars['num_posts_per_page']->value;?>
',
                total: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['total_num_topics']->value)===null||$tmp==='' ? 0 : $tmp);?>
,
                last_page: '<?php echo _t("last page");?>
'
            };

        <?php echo '</script'; ?>
>

        <?php
$_smarty_tpl->ext->_inheritance->blockNesting--;
}
}
/* {/block 'body'} */
}
