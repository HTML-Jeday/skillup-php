<?php
/* Smarty version 3.1.36, created on 2020-11-08 10:14:09
  from '/laravel/Views/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fa7c4f1dfd585_04118581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6dfb002db87864e5730a50783441bef8200f8763' => 
    array (
      0 => '/laravel/Views/index.tpl',
      1 => 1604830367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa7c4f1dfd585_04118581 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17612566725fa7c4f1ded574_19181408', 'body');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'body'} */
class Block_17612566725fa7c4f1ded574_19181408 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17612566725fa7c4f1ded574_19181408',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
        <div class="alert alert-danger" role="alert"><?php ob_start();
echo $_smarty_tpl->tpl_vars['error']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</div>
    <?php }?>
  
    <?php if ((isset($_SESSION['user']))) {?>
        <div class="alert alert-primary" role="alert" style="display: flex; justify-content: space-between;">
            <div> Hi, <?php ob_start();
echo $_SESSION['user']['email'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</div>
            <form action="/auth/logout" method="POST" class="form-group">
            <input type="submit" class="btn btn-danger" value="Logout">
            </form>
        </div>
      
    <?php } else { ?>
        <div class="alert alert-primary"  role="alert">Hi,Guest</div>
        
          <form action="/auth/login" method="POST" class="form-group">
            <input class="form-control" type="email" name="email" placeholder="">
            <input class="form-control" type="password" name="password" placeholder="">
            <input type="submit" class="btn btn-success" value="Login">
        </form>
           
        
    <form action="/auth/register" method="POST" class="form-group">
        <input class="form-control" type="email" name="email" placeholder="example@email.com">
        <input class="form-control" type="password" name="password" placeholder="Password">
        <input type="submit" class="btn btn-success" value="Register">
    </form>
    <?php }?>

    
    
  


 
  <?php if (!(isset($_SESSION['user']))) {?>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Registered At</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
             <?php if ((isset($_smarty_tpl->tpl_vars['users']->value))) {?>
                   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                <tr>
                    <td><a href="/user/info/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['created_at'];?>
</td>
                    <td><a href="/user/delete/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" class="btn btn-danger">Remove</a></td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
          
            
            
        </tbody>
    </table>
    <?php } else { ?>
           <form action="/post/create" method="POST" class="form-group">
               
            <input class="form-control" type="text" name="title" placeholder="Enter the title" style="margin-bottom: 10px;">
            
            <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3" placeholder="enter the text"></textarea>
            </div>
            
            <input type="submit" class="btn btn-success" value="Submit">
            
        </form>
 
    <?php }
}
}
/* {/block 'body'} */
}
