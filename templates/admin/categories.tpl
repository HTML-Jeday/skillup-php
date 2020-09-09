{extends file="layout.tpl"}

{block name="body"}

    <h3>Categories</h3>

    {if isset($smarty.get.error)}
        <div class="alert alert-danger" role="alert">{{$smarty.get.error}}</div>
    {/if}

    {if isset($smarty.get.message)}
        <div class="alert alert-success" role="alert">{{$smarty.get.message}}</div>
    {/if}

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
        </tr>
        </thead>
        <tbody>
           {foreach $categories as $category}
           <tr>
                {foreach $category as $item}
                <td>{$item}</td>
                {/foreach}
            </tr>
            {/foreach}
        </tbody>
    </table>


{/block}