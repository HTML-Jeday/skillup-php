{extends file="layout.tpl"}

{block name="body"}
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Registered At</th>
            <th>Role</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
           <tr>
            {foreach $users as $category}
                <td>{$category.id}</td>
                <td>{$category.email}</td>
                <td>{$category.created_at}</td>
                <td>{$category.is_admin}</td>
                <td>
                    {if $category.is_admin}
                        <button class="btn btn-success">Make user</button>
                    {else} 
                        <button class="btn btn-success">Make admin</button>
                    {/if}
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>
{/block}