<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-07 19:06:31
  from '/laravel/templates/cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f565a87aeab00_18526944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8d9a7596ee3944a038a19270d4f95d1697a71e6' => 
    array (
      0 => '/laravel/templates/cart.tpl',
      1 => 1599157692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f565a87aeab00_18526944 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_979160085f565a87ae4383_34023037', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "body"} */
class Block_979160085f565a87ae4383_34023037 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_979160085f565a87ae4383_34023037',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Count</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Ticket</td>
            <td>- 2 +</td>
            <td>12.50 $</td>
            <td>25.00 $</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Ticket</td>
            <td>- 2 +</td>
            <td>12.50 $</td>
            <td>25.00 $</td>
        </tr>
        </tbody>
    </table>

    <div>Total: 50.00 $</div>

    <button class="btn btn-success">Make order!</button>

<?php
}
}
/* {/block "body"} */
}
