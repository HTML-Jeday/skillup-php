<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-13 15:38:04
  from '/laravel/templates/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f5e12ac90c082_92798308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cdef9198d33067e5b397870208e4501e0e006650' => 
    array (
      0 => '/laravel/templates/register.tpl',
      1 => 1599157692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f5e12ac90c082_92798308 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10251793675f5e12ac909d76_84245808', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "body"} */
class Block_10251793675f5e12ac909d76_84245808 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_10251793675f5e12ac909d76_84245808',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <h3>Regsiter</h3>

    <?php if ((isset($_GET['error']))) {?>
        <div class="alert alert-danger" role="alert"><?php ob_start();
echo $_GET['error'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</div>
    <?php }?>

    <form action="/?action=register" method="POST" style="width: 400px">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-success">Register</button>
    </form>

    <div>
        Already registered? <a href="/?action=login">Login!</a>
    </div>


<?php
}
}
/* {/block "body"} */
}
