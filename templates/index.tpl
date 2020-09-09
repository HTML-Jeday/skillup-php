{extends file="layout.tpl"}

{block name="body"}
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
                <li role="presentation" class="active"><a href="#">All</a></li>
                {foreach $categories as $category}
                    <li role="presentation"><a href="#">{$category.name}</a></li>
                {/foreach}
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
{/block}