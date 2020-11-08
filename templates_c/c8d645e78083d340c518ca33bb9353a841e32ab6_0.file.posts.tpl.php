<?php
/* Smarty version 3.1.36, created on 2020-11-08 12:13:08
  from '/laravel/Views/posts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fa7e0d48c72b1_34498979',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8d645e78083d340c518ca33bb9353a841e32ab6' => 
    array (
      0 => '/laravel/Views/posts.tpl',
      1 => 1604837587,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa7e0d48c72b1_34498979 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4849684055fa7e0d48c3269_74151843', 'body');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'body'} */
class Block_4849684055fa7e0d48c3269_74151843 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_4849684055fa7e0d48c3269_74151843',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php ob_start();
echo $_smarty_tpl->tpl_vars['time']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

    
  
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Text</th>
            <th>Author</th>
            <th>Created At</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
            
       
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['post']->value['text'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['post']->value['author'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['post']->value['created_at'];?>
</td>
                    <td>
                        <a href="/post/update/<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" class="btn btn-primary">Edit</a>
                        <a href="/post/delete/<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" class="btn btn-danger">Delete</a>
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
/* {/block 'body'} */
}
