<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-13 16:24:12
  from '/laravel/templates/admin/categories.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f5e1d7c100d67_62148594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eeaf6bfba20d32ddcad70f9200ec61b3c23a3b99' => 
    array (
      0 => '/laravel/templates/admin/categories.tpl',
      1 => 1600003447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f5e1d7c100d67_62148594 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20118737305f5e1d7c0fb576_01386856', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "body"} */
class Block_20118737305f5e1d7c0fb576_01386856 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_20118737305f5e1d7c0fb576_01386856',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <h3>Categories</h3>

    <?php if ((isset($_GET['error']))) {?>
        <div class="alert alert-danger" role="alert"><?php ob_start();
echo $_GET['error'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</div>
    <?php }?>

    <?php if ((isset($_GET['message']))) {?>
        <div class="alert alert-success" role="alert"><?php ob_start();
echo $_GET['message'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</div>
    <?php }?>

    <form action="/?action=adminCategories" method="POST" style="width: 400px">
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Category name" name="category_name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Order</label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Order" name="category_order">
        </div>
        <button type="submit" class="btn btn-success">Create Category</button>
    </form>


    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Order</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
            <form action="/?action=adminUpdateCategory" method="POST">
            <tr>

                    <td><?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
</td>
                    <td><input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
"></td>
                    <td><input type="number" name="order" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['order'];?>
"></td>
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                    <td><input type="submit" class="btn btn-warning" value="Update"></td>

                <td><a href="/?action=adminRemoveCategory&categoryId=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" class="btn btn-danger">Delete</a></td>
            </form>
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
