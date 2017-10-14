<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:42:47
  from "C:\xampp\htdocs\woodland\forum\admin\layout\templates\dashboard.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e179a7d060f2_37084172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ae5f74afa4f20f74386d390fb04b99bc7c9dda2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\admin\\layout\\templates\\dashboard.tpl',
      1 => 1503857742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e179a7d060f2_37084172 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_abbrev_no')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.abbrev_no.php';
?>



<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>
        Dashboard
        <small>It all starts here.</small>
    </h1>

    <div class="new-update" style="padding: 10px 0; display: none">
        
        <div>Current version:  V.<span id="current_version"</span></div>
        <b>New version available:</b> V.<span id="latest_version"></span> <a style="cursor: pointer;" href="index.php?page=system/upgrade">Upgrade now!</a>
    </div>
    
    <?php echo '<script'; ?>
 type="text/javascript">
        
        function compare(a, b) {
        
            if (a === b) {
                return 0;
             }

             var a_components = a.split(".");
             var b_components = b.split(".");

             var len = Math.min(a_components.length, b_components.length);

             // loop while the components are equal
             for (var i = 0; i < len; i++) {
                 // A bigger than B
                 if (parseInt(a_components[i]) > parseInt(b_components[i])) {
                     return 1;
                 }

                 // B bigger than A
                 if (parseInt(a_components[i]) < parseInt(b_components[i])) {
                     return -1;
                 }
             }

             // If one's a prefix of the other, the longer one is greater.
             if (a_components.length > b_components.length) {
                 return 1;
             }

             if (a_components.length < b_components.length) {
                 return -1;
             }

             // Otherwise they are the same.
             return 0;
        }
        
        $.ajax({
            url: "http://codoforum.com/latest_version",
            dataType: "jsonp",
            jsonp: 'showVersion',
            success: function(data) {

                var currentVersion = '<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
';
                var latestVersion = data.version;

                if(compare(latestVersion, currentVersion) === 1) {

                    $('#latest_version').html(latestVersion);
                    $('#current_version').html(currentVersion);
                    $('.new-update').show();
        
                }

            }
        });   
    <?php echo '</script'; ?>
>    
    
</section>



<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['no_posts']->value);?>

                </h3>
                <p>
                    Posts Made
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-comments"></i>
            </div>
            <a href="../" target="_blank" class="small-box-footer">
                View All <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>    


    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['no_users']->value);?>

                </h3>
                <p>
                    User Registrations
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="index.php?page=users" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['no_topics']->value);?>

                </h3>
                <p>
                    Topics Created
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="../" target="_blank" class="small-box-footer">
                View All <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div> 
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    &nbsp; <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['no_views']->value);?>

                </h3>
                <p>
                    Total Views
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="../" target="_blank" class="small-box-footer">
                Visit Forum <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>                

</div><!-- /.row -->

<div class="row" style="">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Latest News & Alerts</h3>
            </div>
            <div class="panel-body">

                <iframe style="width:100%;height:400px" src="http://codologic.com/todo/php/todo.php">
                </iframe>

            </div>
        </div>
    </div>
</div><!-- /.row -->
<?php }
}
