<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-20 15:35:59
  from '/laravel/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f674caf8cf7d1_14680349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69ea7a5cd70c3e1b1718e3df20c0f2283c06141e' => 
    array (
      0 => '/laravel/templates/index.tpl',
      1 => 1600605355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f674caf8cf7d1_14680349 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1526066965f674caf8c0c82_06139597', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "body"} */
class Block_1526066965f674caf8c0c82_06139597 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_1526066965f674caf8c0c82_06139597',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
            <?php if (($_SERVER['REQUEST_URI'] == "/")) {?>
                <li class="active" role="presentation"><a  href="/">All</a></li>
            <?php } else { ?>
                 <li role="presentation"><a href="/">All</a></li>
            <?php }?>
                
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                <?php if (($_SERVER['REQUEST_URI']) == "/".((string)$_smarty_tpl->tpl_vars['category']->value['name'])) {?>
                    <li role="presentation" class="active"><a href="/<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</a></li>
                <?php } else { ?>
                     <li role="presentation"><a href="/<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</a></li>
                <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
         
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
            <?php if (($_SERVER['REQUEST_URI'] == "/".((string)$_smarty_tpl->tpl_vars['product']->value['category_name']))) {?>
              
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img style="width: 100%; height: 300px" src="/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" alt="...">
                        <div class="caption">
                            <h3><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h3>
                            <p><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
 $</p>
                            <form method="POST" action="/?action=addToCart">
                            <input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" name="id">
                            <p><input type="submit" class="btn btn-success" role="button" value="Add to cart-"></p>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (($_SERVER['REQUEST_URI'] == '/')) {?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img style="width: 100%; height: 300px" src="/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" alt="...">
                    <div class="caption">
                        <h3><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
 $</p>
                        <form method="POST" action="/?action=addToCart">
                        <input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" name="id">
                        <p><input type="submit" class="btn btn-success" role="button" value="Add to cart-"></p>
                        </form>
                    </div>
                </div>
            </div>
            <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
<?php
}
}
/* {/block "body"} */
}
