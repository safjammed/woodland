<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:56:23
  from "C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\forum\editor.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e17cd7338e63_35603006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '035f6a823ac3acfd3399649e8f35e8e69935c83a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\sites\\default\\themes\\2k18\\templates\\forum\\editor.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e17cd7338e63_35603006 (Smarty_Internal_Template $_smarty_tpl) {
?>




<div class="modal fade" id='codo_draft_pending'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"><?php echo _t("Pending draft");?>
</h4>
            </div>
            <div class="modal-body">
                <p><?php echo _t("Your previous draft for topic ");?>
<span id="codo_draft_topic_title"></span> <?php echo _t("is pending");?>
</p>
                <p><?php echo _t("If you continue, ");
echo _t("your previous draft will be discarded.");?>
 </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Cancel");?>
</button>
                <button onclick="CODOF.autoDraft.recycle();" type="button" class="btn btn-primary"><?php echo _t("Continue");?>
</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Modal -->
<div class="modal animated bounceInDown" id="codo_modal_link" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><?php echo _t("Add link");?>
</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">

                    <input id="codo_modal_link_url" name="element_1" type="text" class="form-control" placeholder="<?php echo _t("link url");?>
" required=""/>
                    <hr/>

                    <input id="codo_modal_link_text" name="element_2" type="text" class="form-control" placeholder="<?php echo _t("link text");?>
 - <?php echo _t("optional");?>
"/>
                    <hr/>

                    <input id="codo_modal_link_title" name="element_3" type="text" class="form-control" placeholder="<?php echo _t("link title");?>
 - <?php echo _t("optional");?>
"/>
                </form>

            </div>
            <div class="modal-footer">
                <div class="codo_modal_link_cancel codo_btn codo_btn_def" data-dismiss="modal"><?php echo _t("Cancel");?>
</div>
                <div id="codo_modal_link_submit" class="codo_btn codo_btn_primary"><?php echo _t("Add");?>
</div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div class="modal animated bounceInDown" id="codo_modal_upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><?php echo _t("Upload");?>
</h4>
            </div>
            <div class="modal-body">
                <form class="dropzone"
                      id="codomyawesomedropzone">

                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>

                    <input name="token" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['CSRF_token']->value;?>
" />
                </form>

            </div>
            <div class="modal-footer">
                <div class="codo_modal_upload_cancel codo_btn codo_btn_def" data-dismiss="modal"><?php echo _t("Cancel");?>
</div>
                <div id="codo_modal_upload_submit" class="codo_btn"><?php echo _t("Upload");?>
</div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<a id="jquery-oembed-me"></a>
<?php }
}
