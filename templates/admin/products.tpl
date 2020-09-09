{extends file="layout.tpl"}

{block name="body"}
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Picture</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><img src=""></td>
                <td>iPhone XS Max</td>
                <td>Some phone</td>
                <td>25.00 $</td>
                <td>
                    <button class="btn btn-warning">Update</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td><img src=""></td>
                <td>iPhone XS Max</td>
                <td>Some phone</td>
                <td>25.00 $</td>
                <td>
                    <button class="btn btn-warning">Update</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>

        </tbody>
    </table>
{/block}