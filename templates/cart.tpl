{extends file="layout.tpl"}

{block name="body"}


    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Count</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Ticket</td>
            <td>- 2 +</td>
            <td>12.50 $</td>
            <td>25.00 $</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Ticket</td>
            <td>- 2 +</td>
            <td>12.50 $</td>
            <td>25.00 $</td>
        </tr>
        </tbody>
    </table>

    <div>Total: 50.00 $</div>

    <button class="btn btn-success">Make order!</button>

{/block}