<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-09 22:31:22
  from '/laravel/templates/admin/users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f592d8aa12be5_84681723',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5d63cb7418ad84353970229dffb4717f377b0f4' => 
    array (
      0 => '/laravel/templates/admin/users.tpl',
      1 => 1599679881,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f592d8aa12be5_84681723 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5822071005f592d8aa0f1d7_61536582', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "body"} */
class Block_5822071005f592d8aa0f1d7_61536582 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_5822071005f592d8aa0f1d7_61536582',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Registered At</th>
            <th>Role</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
           <tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                <td><?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['category']->value['email'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['category']->value['created_at'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['category']->value['is_admin'];?>
</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['category']->value['is_admin']) {?>
                        <button class="btn btn-success">Make user</button>
                    <?php } else { ?> 
                        <button class="btn btn-success">Make admin</button>
                    <?php }?>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
<?php
}
}
/* {/block "body"} */
}
