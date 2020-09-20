{extends file="layout.tpl"}

{block name="body"}
    <table class="table">
        <thead>
            <tr>
                <th rowspan="2">Order ID</th>
                <th colspan="4" style="text-align: center">Products</th>
            </tr>
            <tr>
                <th>NAME</th>
                <th>IMAGE</th>
                <th>PRICE</th>
                <th>COUNT</th>
            </tr>
        </thead>
        <tbody>

        {foreach from=$orders item=order}
            <tr>
                <td rowspan="{count($order['products'])}">{$order['id']}</td>


                {foreach from=$order['products'] item=product}
                    <td>{$product['name']}</td>
                    <td>Image</td>
                    <td>{$product['price']}</td>
                    <td>{$product['count']}</td>
                    </tr>
                {/foreach}
        {/foreach}

        </tbody>
    </table>
{/block}