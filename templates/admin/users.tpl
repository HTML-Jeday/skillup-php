{extends file="layout.tpl"}

{block name="body"}
    {if isset($smarty.get.message)}
    <div class="alert alert-success" role="alert">
        {$smarty.get.message}
    </div>
    {/if}
    {if isset($smarty.get.error)}
    <div class="alert alert-danger" role="alert">
        {$smarty.get.error}
    </div>
    {/if}  
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
            {foreach from=$users item=user}
                <td>{$user['id']}</td>
                <td>{$user['email']}</td>
                <td>{$user['created_at']}</td>
                {if $user['is_admin']}
                    <td>admin</td>
                {else}
                    <td>user</td>
                {/if}
                <td style="display: flex">
                    {if $user['is_admin']}
                         <form action="/?action=adminChangeRole" method="POST" style="margin: 0">
                            <input type="hidden" value="{$user['id']}" name="id">
                            <input type="hidden" value="0" name="admin">
                            <input type="submit" class="btn btn-primary" value="Make user">
                        </form>
                    {else} 
                         <form action="/?action=adminChangeRole" method="POST" style="margin: 0">
                            <input type="hidden" value="{$user['id']}" name="id">
                            <input type="hidden" value="1" name="admin">
                            <input type="submit" class="btn btn-success" value="Make admin">
                        </form>
                    {/if}
                    {if $user['id'] == $smarty.session.user.id}
                        
                    {else}
                    <form action="/?action=adminDeleteUser" method="POST" style="margin: 0">
                            <input type="hidden" value="{$user['id']}" name="id">
                            <input type="submit" class="btn btn-danger" style="margin-left: 5px;" value="Delete">
                    </form>
                       
                    {/if}
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>
{/block}