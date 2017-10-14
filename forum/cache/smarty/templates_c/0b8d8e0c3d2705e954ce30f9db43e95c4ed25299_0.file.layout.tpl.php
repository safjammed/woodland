<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:42:25
  from "C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e17991a8eea2_46772425',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b8d8e0c3d2705e954ce30f9db43e95c4ed25299' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\sites\\default\\themes\\2k18\\templates\\layout.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e17991a8eea2_46772425 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_get_opt')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.get_opt.php';
if (!is_callable('smarty_modifier_load_block')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.load_block.php';
if (!is_callable('smarty_modifier_get_preference')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.get_preference.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="description" content="<?php echo smarty_modifier_get_opt("site_description");?>
">

        <meta name="author" content="BABA">
        <title><?php 
new Block_title_2333359e1799183a117_52426857($_smarty_tpl);
?>
</title>
        <!--[if lte IE 8]>
         <?php echo '<script'; ?>
 src="//cdnjs.cloudflare.com/ajax/libs/json2/20121008/json2.min.js"><?php echo '</script'; ?>
>
        <![endif]-->

        <?php echo smarty_modifier_load_block("block_head");?>


        <!--
                <?php echo '<script'; ?>
 type="text/javascript" language="javascipt" src="http://localhost/codoforum/freichat/client/main.php"><?php echo '</script'; ?>
> 
                <link rel="stylesheet" href="http://localhost/codoforum/freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css">
        -->
        <?php echo '<script'; ?>
 type="text/javascript">

            var on_codo_loaded = function () {
            };
            var codo_defs = {
                url: "<?php echo @constant('RURI');?>
",
                duri: "<?php echo @constant('DURI');?>
",
                def_theme: "<?php echo @constant('CURR_THEME');?>
",
                reluri: "<?php echo @constant('DATA_REL_PATH');?>
",
                token: "<?php echo $_smarty_tpl->tpl_vars['CSRF_token']->value;?>
",
                smiley_path: "<?php echo @constant('SMILEY_PATH');?>
",
                logged_in: "<?php echo $_smarty_tpl->tpl_vars['I']->value->loggedIn() ? 'yes' : 'no';?>
",
                uid: "<?php echo $_smarty_tpl->tpl_vars['I']->value->id;?>
",
                login_url: "<?php echo $_smarty_tpl->tpl_vars['login_url']->value;?>
",
                time: "<?php echo $_smarty_tpl->tpl_vars['php_time_now']->value;?>
",
                forum_tags_num: <?php echo $_smarty_tpl->tpl_vars['forum_tags_num']->value;?>
,
                forum_tags_len: <?php echo $_smarty_tpl->tpl_vars['forum_tags_len']->value;?>
,
                unread_notifications: '<?php echo $_smarty_tpl->tpl_vars['unread_notifications']->value;?>
',
                trans: {
                    embed_no_preview: "<?php echo _t('preview not available inside editor');?>
",
                    editor: {

                        bold: "<?php echo _t('Bold');?>
",
                        italic: "<?php echo _t('Italic');?>
",
                        bulleted_list: "<?php echo _t('Bulleted List');?>
",
                        numeric_list: "<?php echo _t('Numeric List');?>
",
                        picture: "<?php echo _t('Picture');?>
",
                        link: "<?php echo _t('Link');?>
",
                        quotes: "<?php echo _t('Quotes');?>
",
                        preview: "<?php echo _t('Preview');?>
"
                    },
                    notify: {
                        mention: "<?php echo _t("New mention");?>
",
                        mention_action: "<?php echo _t("mentioned you in");?>
",
                        rolled_up_trans: "<?php echo _t(" for same topic");?>
",
                        caught_up: "<?php echo _t("No new notifications");?>
"
                    }
                },
                preferences: {
                    drafts: {
                        autosave: 'yes'
                    },
                    notify: {
                        real_time: "<?php echo smarty_modifier_get_preference("real_time_notifications");?>
",
                        desktop: "<?php echo smarty_modifier_get_preference("desktop_notifications");?>
"
                    }
                }

            };

            if (codo_defs.unread_notifications != '') {
                codo_defs.unread_notifications = parseInt(codo_defs.unread_notifications);
            } else {
                codo_defs.unread_notifications = 0;
            }

            var CODOF = {
                hook: {
                    hooks: [],
                    add: function (myhook, func, weight, args) {

                        var i = 0;
                        if (typeof weight === "undefined") {

                            weight = 0;
                        }
                        if (typeof args === "undefined") {

                            args = {
                            };
                        }

                        if (typeof CODOF.hook.hooks[myhook] !== "undefined") {

                            i = CODOF.hook.hooks[myhook].length;
                        } else {

                            CODOF.hook.hooks[myhook] = [];
                        }

                        CODOF.hook.hooks[myhook][i] = {
                            func: func,
                            args: args,
                            weight: weight
                        };
                    }
                }
            }


        <?php echo '</script'; ?>
>

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo @constant('DURI');?>
assets/img/general/img/favicon.ico?v=1">
        <link rel="apple-touch-icon" sizes="57x57" href="http://codoforum.com/img/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="http://codoforum.com/img/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="http://codoforum.com/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="http://codoforum.com/img/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="http://codoforum.com/img/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="http://codoforum.com/img/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="http://codoforum.com/img/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="http://codoforum.com/img/apple-touch-icon-152x152.png">
        <link rel="icon" type="image/png" href="http://codoforum.com/img/favicon-196x196.png" sizes="196x196">
        <link rel="icon" type="image/png" href="http://codoforum.com/img/favicon-160x160.png" sizes="160x160">
        <link rel="icon" type="image/png" href="http://codoforum.com/img/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="http://codoforum.com/img/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="http://codoforum.com/img/favicon-32x32.png" sizes="32x32">


        <!-- Some SEO stuff -->

        <?php if (isset($_smarty_tpl->tpl_vars['meta_robots']->value)) {?>

            <meta name="robots" content="<?php echo $_smarty_tpl->tpl_vars['meta_robots']->value;?>
">
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['canonical']->value)) {?>

            <link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['canonical']->value;?>
" />
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['rel_prev']->value)) {?>

            <link rel="prev" href="<?php echo $_smarty_tpl->tpl_vars['rel_prev']->value;?>
" />
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['rel_next']->value)) {?>

            <link rel="next" href="<?php echo $_smarty_tpl->tpl_vars['rel_next']->value;?>
" />
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['google_plus_profile']->value)) {?>
            <link rel="author" href="https://plus.google.com/<?php echo $_smarty_tpl->tpl_vars['google_plus_profile']->value;?>
"/>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['og']->value)) {?>    <!-- Twitter Card data -->
            <meta name="twitter:card" content="summary">

            <!-- Open Graph data -->
            <meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['title'];?>
" />
            <meta property="og:type" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['type'];?>
" />
            <?php if (isset($_smarty_tpl->tpl_vars['og']->value['url'])) {?><meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['url'];?>
" /><?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['og']->value['image'])) {?><meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['image'];?>
" /><?php }?>             
            <?php if (isset($_smarty_tpl->tpl_vars['og']->value['desc'])) {?><meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['desc'];?>
" /><?php }?>

            <meta property="og:site_name" content="<?php echo $_smarty_tpl->tpl_vars['site_title']->value;?>
" />

            <!-- Schema.org markup for Google+ -->
            <meta itemprop="name" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['title'];?>
">
            <?php if (isset($_smarty_tpl->tpl_vars['og']->value['desc'])) {?><meta itemprop="description" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['desc'];?>
"><?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['og']->value['image'])) {?><meta itemprop="image" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['image'];?>
"><?php }?>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['article_published']->value)) {?><meta property="article:published_time" content="<?php echo $_smarty_tpl->tpl_vars['article_published']->value;?>
" /><?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['article_modified']->value)) {?><meta property="article:modified_time" content="<?php echo $_smarty_tpl->tpl_vars['article_modified']->value;?>
" /><?php }?>

        <!-- SEO stuff ends -->


        <?php echo $_smarty_tpl->tpl_vars['page']->value['head']['css'];?>
        
        <?php echo $_smarty_tpl->tpl_vars['page']->value['head']['js'];?>


        <style type="text/css">

            .navbar {

                border-radius: 0;

            }


            .nav .open > a, .nav .open > a:hover, .nav .open > a:focus {

                background: white;
            }

            .navbar-clean .container-fluid {

                padding-left: 20px;
                padding-right: 30px;
            }


            .codo_forum_title:hover {
                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                transition: all 0.5s ease;
            }

            .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {

                color: white;
                background: #3794db;
            }

            .container{
                /* margin-top: 60px;*/
            }

            .CODOFORUM{

                position:relative !important;
                top:0;

            }

            .mm-page {

                height: 100%;
            }
        </style>

    </head>

    <body>

        <?php echo smarty_modifier_load_block("block_body_start");?>




        <div class="CODOFORUM">


            <nav id="mmenu" style="display: none">
                <ul>



                    <?php if ($_smarty_tpl->tpl_vars['I']->value->loggedIn()) {?>

                        <li style="text-align:center">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['profile_url']->value;?>
"><img  src="<?php echo $_smarty_tpl->tpl_vars['I']->value->avatar;?>
" style="width: 50px;border-radius: 30px;border: 3px solid"/></a>
                            <span style="padding: 10px 0px;font-weight:bold"><?php echo $_smarty_tpl->tpl_vars['I']->value->name;?>
</span>
                        </li>
                        <li title="<?php echo _t('Notifications');?>
" class="codo_inline_notifications_show_all">

                            <a class="glyphicon glyphicon-bell">
                                <span><?php echo _t('Notifications');?>
</span>
                                <?php if ($_smarty_tpl->tpl_vars['unread_notifications']->value) {?>
                                    <span class="codo_inline_notifications_unread_no codo_inline_notifications_unread_no_mobile"><?php echo $_smarty_tpl->tpl_vars['unread_notifications']->value;?>
</span>
                                <?php }?>

                            </a>

                        </li>

                        <?php if ($_smarty_tpl->tpl_vars['canCreateTopicInAtleastOneCategory']->value) {?>
                            <li class="" onclick="codo_create_topic()">


                                <a class="glyphicon glyphicon-pencil" >  <span><?php echo _t('New topic');?>
</span></a>

                            </li>
                        <?php }?>

                        <li class="">

                            <span  class="glyphicon glyphicon-user" > <?php echo _t('Profile');?>
</span>
                            <ul>


                                <li><a class="glyphicon glyphicon-user" href="<?php echo $_smarty_tpl->tpl_vars['profile_url']->value;?>
">  <span><?php echo _t("View Profile");?>
</span></a></li>
                                <li><a class="glyphicon glyphicon-pencil" href="<?php echo $_smarty_tpl->tpl_vars['profile_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['I']->value->id;?>
/edit">  <span><?php echo _t("Edit");?>
</span></a></li>
                                <li><a class="glyphicon glyphicon-log-out" href="<?php echo $_smarty_tpl->tpl_vars['logout_url']->value;?>
">  <span><?php echo _t("Logout");?>
</span></a></li>

                            </ul>
                        </li>

                        

                    <?php } else { ?>

                        <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['register_url']->value;?>
"><?php echo _t("Register");?>
</a></li>
                        <li><a id="codo_login_link" href="<?php echo $_smarty_tpl->tpl_vars['login_url']->value;?>
"><?php echo _t("Login");?>
</a></li>
                        <?php }?>

                    <?php echo smarty_modifier_load_block("block_main_menu");?>



                </ul>
            </nav>
            <nav id="nav" class="navbar navbar-clean navbar-fixed-top" role="navigation">
                <div class="container-fluid" style="width:85%;">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle pull-left"  onclick='$("#mmenu").trigger("open.mm");' >
                            <span class="sr-only"><?php echo _t("Toggle navigation");?>
</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        


                       
                        <?php if ($_smarty_tpl->tpl_vars['tpl']->value == "forum/topics") {?>
                         <a style="width: 200px;padding-left: 15px" href="<?php echo @constant('RURI');
echo $_smarty_tpl->tpl_vars['site_url']->value;?>
" class="navbar-brand codo_forum_title" ><?php echo $_smarty_tpl->tpl_vars['site_title']->value;?>
</a>
                        <?php } else { ?>
                         <a style="width: 200px;padding-left: 28px" href="<?php echo @constant('RURI');
echo $_smarty_tpl->tpl_vars['site_url']->value;?>
" class="navbar-brand codo_forum_title" ><?php echo $_smarty_tpl->tpl_vars['site_title']->value;?>
</a>
                        <?php }?>
                       

                        

                    </div>


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="codo_navbar_content">




                        <ul class="nav navbar-nav navbar-right">
                            <?php if (isset($_smarty_tpl->tpl_vars['can_search']->value) && $_smarty_tpl->tpl_vars['can_search']->value) {?>    
                                <li class="dropdown hidden-xs global_search">
                                   <input class="codo_global_search_input" type="text" placeholder="<?php echo _t('Search');?>
" />
                                </li>
                                <li class="dropdown hidden-xs global_search">
                                    <a href="#" id="codo_global_search">                                        
                                        <i class="glyphicon glyphicon-search" title="Advanced search" ></i>
                                    </a>
                                </li>
                            <?php }?>


                            <?php echo smarty_modifier_load_block("block_main_menu");?>


                            <?php if ($_smarty_tpl->tpl_vars['I']->value->loggedIn()) {?>

                                <li class="dropdown hidden-xs codo_tooltip" data-toggle="tooltip" data-placement="bottom" title="<?php echo _t('Notifications');?>
">
                                    <a data-toggle="dropdown" class="codo_nav_icon codo_inline_notifications" id="codo_inline_notifications">
                                        <!--<i class="icon-bell"></i>-->
                                        <i class="material-icons">notifications</i>
                                        <?php if ($_smarty_tpl->tpl_vars['unread_notifications']->value) {?>
                                            <span class="codo_inline_notifications_unread_no"><?php echo $_smarty_tpl->tpl_vars['unread_notifications']->value;?>
</span>
                                        <?php }?>
                                    </a>
                                    <ul class="dropdown-menu codo_inline_notifications_list" id="codo_inline_notifications_list" role="menu" aria-labelledby="dLabel">

                                        <div class="codo_inline_notification_header">
                                            <div class="codo_load_more_bar_black_gif" ></div>
                                            <div class="codo_inline_notification_header_content" id="codo_inline_notification_header_content">

                                                <span><?php echo _t("Notifications");?>
</span>
                                                <div>
                                                    
                                                    <span id="codo_inline_notifications_preferences" class="glyphicon glyphicon-tasks"  data-toggle="tooltip" data-placement="bottom" title="<?php echo _t('preferences');?>
"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="codo_inline_notification_body" id="codo_inline_notification_body">

                                            
                                        </div>
                                        <div class="codo_inline_notification_footer codo_inline_notifications_show_all">
                                            <span><?php echo _t("show all");?>
</span><i class="glyphicon glyphicon-time"></i>
                                        </div>
                                    </ul>
                                </li>

                                <li class="codo_xs_li visible-xs-block">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['profile_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['I']->value->id;?>
/edit#notifications">
                                        <i class="icon-bell"></i>
                                        <span class="visible-xs-inline"> <?php echo _t("Notifications");?>
</span>
                                    </a>
                                </li>

                                <li class="codo_menu_user dropdown">

                                    <a class="codo_menu_user_img" data-toggle="dropdown"><img  src="<?php echo $_smarty_tpl->tpl_vars['I']->value->avatar;?>
" />
                                        <span class="codo_user_name_span"><?php echo $_smarty_tpl->tpl_vars['I']->value->name;?>
</span>
                                    </a>
                                    <ul class="dropdown-menu codo_menu_user_container" role="menu" aria-labelledby="dLabel">


                                        <li><a class="glyphicon glyphicon-user" href="<?php echo $_smarty_tpl->tpl_vars['profile_url']->value;?>
">  <span><?php echo _t("Profile");?>
</span></a></li>
                                        <li><a class="glyphicon glyphicon-pencil" href="<?php echo $_smarty_tpl->tpl_vars['profile_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['I']->value->id;?>
/edit">  <span><?php echo _t("Edit");?>
</span></a></li>
                                        <li><a class="glyphicon glyphicon-log-out" href="<?php echo $_smarty_tpl->tpl_vars['logout_url']->value;?>
">  <span><?php echo _t("Logout");?>
</span></a></li>

                                    </ul>
                                </li>

                                

                            <?php } else { ?>

                                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['register_url']->value;?>
"><?php echo _t("Register");?>
</a></li>
                                <li><a id="codo_login_link" href="<?php echo $_smarty_tpl->tpl_vars['login_url']->value;?>
"><?php echo _t("Login");?>
</a></li>
                                <?php }?>

                            <li class="codo_back_to_top"><a class="codo_back_to_top_arrow"><i class="icon-arrow-top"></i></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>




            <div class='codo_modal_bg'></div>

        <?php 
new Block_body_1765859e17991a29b18_50246186($_smarty_tpl);
?>


        <div class="codo_footer">

            <?php echo $_smarty_tpl->tpl_vars['page']->value['body']['js'];?>

            <?php echo smarty_modifier_load_block("block_footer");?>



            <footer class="footer">
                <div class="container" style="padding:0px;">
                    <div class="row" style="padding: 5px !important">
                        <div class="col-sm-4">&copy; 2017 <?php echo $_smarty_tpl->tpl_vars['site_title']->value;?>
<br>


                            <small><?php echo _t("Powered by");?>
 <a href="http://codoforum.com" target="_blank">Codoforum</a></small>
                        </div>

                        <div class="col-sm-4 pull-right" style="text-align: center">


                            <?php echo smarty_modifier_load_block("block_footer_right");?>




                            <span class=''></span>

                        </div>

                    </div>
                </div>
            </footer>        


            <div style="display: none" id="codo_js_php_defs"></div>
        </div>
        <div class='notifications bottom-right'></div>


    </div>


    <?php echo smarty_modifier_load_block("block_body_end");?>


    
    
        <?php echo '<script'; ?>
 style="display: none" id="codo_inline_notifications_template" type="text/html">

            {{#each objects}}
            <a target="_blank" href="{{../url}}{{link}}" class="codo_inline_notification_el codo_notification_is_read_{{is_read}}">

                <div class="codo_inline_notification_el_img">

                    {{#isRemote actor.avatar}}
                    <img src="{{../actor.avatar}}" />                    
                    {{else}}
                    <img src="{{../../duri}}assets/img/profiles/icons/{{../actor.avatar}}" />                    
                    {{/isRemote}}
                </div>
                <div class="codo_inline_notification_el_body">
                    <div class="codo_inline_notification_el_head">
                        <span class="codo_inline_notification_el_title">{{title}}</span>
                        {{#if rolledX}}
                        <span data-toggle="tooltip" data-placement="bottom" title="{{../rolledX}}{{../../rolled_up_trans}}" class="codo_inline_notification_el_rolled">{{rolledX}}</span>
                        {{/if}}
                        <div class="codo_inline_notification_el_created">{{created}}</div>
                    </div>
                    <div class="codo_inline_notification_el_text">
                        <span>{{{body}}}</b></span>
                    </div>
                </div>
            </a>
            {{else}}
            <div class="codo_inline_notification_caught_up">{{../caught_up}}</div>
            {{/each}}
        <?php echo '</script'; ?>
>
    

    <div class="codo_editor_draft">
        <div>
            <div id="codo_pending_text" class="codo_pending_text"><?php echo _t("Pending draft ...");?>
 <?php echo _t("Click to resume editing");?>
</div>
            <div class="codo_delete_draft"><i class="icon-trash"></i> <?php echo _t(" Discard draft");?>
 </div>
        </div>
    </div>

    <div id="codo_is_xs" class="hidden-xs"></div>    
    <div id="codo_is_sm" class="hidden-sm"></div>

    <?php echo '<script'; ?>
 type="text/javascript">
                                        /** Lets optimize to the MAX **/
                                        function downloadJSAtOnload() {

                                        var files = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['page']->value['defer'];?>
');
                                                var len = files.length;
                                                var i = 0;
                                                var element = document.createElement("script");
                                                element.src = files[i];
                                                element.async = false;
                                                document.body.appendChild(element);
                                                if (element.readyState) {  //IE
                                        element.onreadystatechange = function() {
                                        if (element.readyState === "loaded" || element.readyState === "complete") {
                                        element.onreadystatechange = null;
                                                on_codo_loaded();
                                                codo_load_js();
                                        }
                                        };
                                        } else {  //Others
                                        element.onload = function() {
                                        on_codo_loaded();
                                                CODOF.hook.call('on_cf_loaded');
                                                codo_load_js();
                                        };
                                        }

                                        function codo_load_js() {
                                        var element;
                                                for (var i = 1; i < len; i++) {
                                        element = document.createElement("script");
                                                element.src = files[i];
                                                element.async = false;
                                                document.body.appendChild(element);
                                                if (i === len - 1) {
                                        element.onload = function() {
                                        CODOF.hook.call('on_scripts_loaded');
                                        }
                                        }
                                        }
                                        }
                                        }
                                        if (window.addEventListener)
                                                window.addEventListener("load", downloadJSAtOnload, false);
                                                else if (window.attachEvent)
                                                window.attachEvent("onload", downloadJSAtOnload);
                                                else window.onload = downloadJSAtOnload;
    <?php echo '</script'; ?>
>    
</body>

</html>
<?php }
/* {block 'title'} C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\layout.tpl */
class Block_title_2333359e1799183a117_52426857 extends Smarty_Internal_Block
{
public $name = "title";
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->blockNesting++;
echo $_smarty_tpl->tpl_vars['sub_title']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['site_title']->value;
$_smarty_tpl->ext->_inheritance->blockNesting--;
}
}
/* {/block 'title'} */
/* {block 'body'} C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\layout.tpl */
class Block_body_1765859e17991a29b18_50246186 extends Smarty_Internal_Block
{
public $name = "body";
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->blockNesting++;
$_smarty_tpl->ext->_inheritance->blockNesting--;
}
}
/* {/block 'body'} */
}
