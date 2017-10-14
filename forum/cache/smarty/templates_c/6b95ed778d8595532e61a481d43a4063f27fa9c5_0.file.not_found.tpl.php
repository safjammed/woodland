<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-14 03:55:25
  from "C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\not_found.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59e17c9d9b5f68_64096024',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b95ed778d8595532e61a481d43a4063f27fa9c5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\woodland\\forum\\sites\\default\\themes\\2k18\\templates\\not_found.tpl',
      1 => 1503857738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_59e17c9d9b5f68_64096024 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_load_block')) require_once 'C:\\xampp\\htdocs\\woodland\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.load_block.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
new Block_body_2326459e17c9d9b2c80_12591631($_smarty_tpl);
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} C:\xampp\htdocs\woodland\forum\sites\default\themes\2k18\templates\not_found.tpl */
class Block_body_2326459e17c9d9b2c80_12591631 extends Smarty_Internal_Block
{
public $name = 'body';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->blockNesting++;
?>


    <style type="text/css">

        .codo_not_found {

            margin-top: 60px;
            background: white;
            box-shadow: 1px 1px 5px #ccc;
            padding: 20px;
        }

    </style>

    <div class="container">

        <?php echo smarty_modifier_load_block("block_not_found_before");?>
        
        <div class="codo_not_found">

            <?php echo smarty_modifier_load_block("block_not_found_start");?>


            <?php echo _t("The page you are looking for does not exists!");?>

            <?php echo smarty_modifier_load_block("block_not_found_end");?>


        </div>
        <?php echo smarty_modifier_load_block("block_not_found_after");?>


    </div>
<?php
$_smarty_tpl->ext->_inheritance->blockNesting--;
}
}
/* {/block 'body'} */
}
