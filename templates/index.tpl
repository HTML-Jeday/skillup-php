{extends file="layout.tpl"}

{block name="body"}
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
            {if ($smarty.server.REQUEST_URI == "/")}
                <li class="active" role="presentation"><a  href="/">All</a></li>
            {else}
                 <li role="presentation"><a href="/">All</a></li>
            {/if}
                
            {foreach from=$categories item=category}
                {if ($smarty.server.REQUEST_URI) == "/{$category['name']}"}
                    <li role="presentation" class="active"><a href="/{$category['name']}">{$category['name']}</a></li>
                {else}
                     <li role="presentation"><a href="/{$category['name']}">{$category['name']}</a></li>
                {/if}
            {/foreach}
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
         
            {foreach from=$products item=product}
            {if ($smarty.server.REQUEST_URI == "/{$product['category_name']}")}
              
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img style="width: 100%; height: 300px" src="/{$product['image']}" alt="...">
                        <div class="caption">
                            <h3>{$product['name']}</h3>
                            <p>{$product['price']} $</p>
                            <form method="POST" action="/?action=addToCart">
                            <input type='hidden' value="{$product['id']}" name="id">
                            <p><input type="submit" class="btn btn-success" role="button" value="Add to cart-"></p>
                            </form>
                        </div>
                    </div>
                </div>
            {/if}
            {if ($smarty.server.REQUEST_URI == '/')}
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img style="width: 100%; height: 300px" src="/{$product['image']}" alt="...">
                    <div class="caption">
                        <h3>{$product['name']}</h3>
                        <p>{$product['price']} $</p>
                        <form method="POST" action="/?action=addToCart">
                        <input type='hidden' value="{$product['id']}" name="id">
                        <p><input type="submit" class="btn btn-success" role="button" value="Add to cart-"></p>
                        </form>
                    </div>
                </div>
            </div>
            {/if}
            {/foreach}
        </div>
    </div>
{/block}