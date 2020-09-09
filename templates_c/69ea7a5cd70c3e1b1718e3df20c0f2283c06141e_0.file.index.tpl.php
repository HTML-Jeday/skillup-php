<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-09 20:59:03
  from '/laravel/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f5917e7905e56_32083354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69ea7a5cd70c3e1b1718e3df20c0f2283c06141e' => 
    array (
      0 => '/laravel/templates/index.tpl',
      1 => 1599674342,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f5917e7905e56_32083354 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17111706305f5917e7903ed5_28867746', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "body"} */
class Block_17111706305f5917e7903ed5_28867746 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17111706305f5917e7903ed5_28867746',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
                <li role="presentation" class="active"><a href="#">All</a></li>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                    <li role="presentation"><a href="#"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</a></li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
        <div class="col-md-9">


            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="1.png" alt="...">
                        <div class="caption">
                            <h3>Product 1</h3>
                            <p>100 $</p>
                            <p><a href="#" class="btn btn-success" role="button">Add to cart</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="1.png" alt="...">
                        <div class="caption">
                            <h3>Product 1</h3>
                            <p>100 $</p>
                            <p><a href="#" class="btn btn-success" role="button">Add to cart</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="1.png" alt="...">
                        <div class="caption">
                            <h3>Product 1</h3>
                            <p>100 $</p>
                            <p><a href="#" class="btn btn-success" role="button">Add to cart</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="1.png" alt="...">
                        <div class="caption">
                            <h3>Product 1</h3>
                            <p>100 $</p>
                            <p><a href="#" class="btn btn-success" role="button">Add to cart</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="1.png" alt="...">
                        <div class="caption">
                            <h3>Product 1</h3>
                            <p>100 $</p>
                            <p><a href="#" class="btn btn-success" role="button">Add to cart</a></p>
                        </div>
                    </div>
                </div>


        </div>
    </div>
<?php
}
}
/* {/block "body"} */
}
