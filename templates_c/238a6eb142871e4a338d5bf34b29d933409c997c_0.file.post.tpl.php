<?php
/* Smarty version 3.1.36, created on 2020-11-08 13:30:36
  from '/laravel/Views/post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fa7f2fce1e907_15737963',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '238a6eb142871e4a338d5bf34b29d933409c997c' => 
    array (
      0 => '/laravel/Views/post.tpl',
      1 => 1604842229,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa7f2fce1e907_15737963 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8088921415fa7f2fce1c564_02870762', 'body');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'body'} */
class Block_8088921415fa7f2fce1c564_02870762 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_8088921415fa7f2fce1c564_02870762',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    
   
  
         <form action="/post/edit" method="POST" class="form-group">
             

               
            <input class="form-control" type="text" name="title" placeholder="<?php echo $_smarty_tpl->tpl_vars['post']->value->getTitle();?>
" value="<?php echo $_smarty_tpl->tpl_vars['post']->value->getTitle();?>
" style="margin-bottom: 10px; margin-top: 10px;" >
            
            <div class="form-group">
                <input class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"  value="<?php echo $_smarty_tpl->tpl_vars['post']->value->getText();?>
" >
            </div>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['post']->value->getId();?>
}">
            
            <input type="submit" class="btn btn-success" value="Submit">
            
        </form>

<?php
}
}
/* {/block 'body'} */
}
