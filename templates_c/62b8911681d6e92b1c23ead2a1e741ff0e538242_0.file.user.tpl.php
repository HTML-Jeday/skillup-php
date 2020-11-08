<?php
/* Smarty version 3.1.36, created on 2020-10-29 18:22:49
  from '/laravel/Views/user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f9b087912c177_56063376',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62b8911681d6e92b1c23ead2a1e741ff0e538242' => 
    array (
      0 => '/laravel/Views/user.tpl',
      1 => 1603995707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f9b087912c177_56063376 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11983689265f9b08790e9ef4_76922203', 'body');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'body'} */
class Block_11983689265f9b08790e9ef4_76922203 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_11983689265f9b08790e9ef4_76922203',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    ID: <?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
<br>
    EMAIL: <?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
<br>
    CREATED_AT: <?php echo $_smarty_tpl->tpl_vars['user']->value->getCreatedAt();?>
<br>
<?php
}
}
/* {/block 'body'} */
}
