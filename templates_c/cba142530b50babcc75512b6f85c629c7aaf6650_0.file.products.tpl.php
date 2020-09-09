<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-09 20:51:40
  from '/laravel/templates/admin/products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f59162c650d59_95845463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cba142530b50babcc75512b6f85c629c7aaf6650' => 
    array (
      0 => '/laravel/templates/admin/products.tpl',
      1 => 1599157692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f59162c650d59_95845463 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15841839895f59162c650717_79120216', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "body"} */
class Block_15841839895f59162c650717_79120216 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_15841839895f59162c650717_79120216',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Picture</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><img src=""></td>
                <td>iPhone XS Max</td>
                <td>Some phone</td>
                <td>25.00 $</td>
                <td>
                    <button class="btn btn-warning">Update</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td><img src=""></td>
                <td>iPhone XS Max</td>
                <td>Some phone</td>
                <td>25.00 $</td>
                <td>
                    <button class="btn btn-warning">Update</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>

        </tbody>
    </table>
<?php
}
}
/* {/block "body"} */
}
