{extends file="layout.tpl"}
{block name=body}
    
  
    {if isset($smarty.session.user)}
        <div class="alert alert-primary" role="alert" style="display: flex; justify-content: space-between;">
            <div> Hi, {{$smarty.session.user.email}}</div>
            <form action="/auth/logout" method="POST" class="form-group">
            <input type="submit" class="btn btn-danger" value="Logout">
            </form>
        </div>
      
    {else}
        <div class="alert alert-primary"  role="alert">Hi,Guest</div>
        
          <form action="/auth/login" method="POST" class="form-group">
            <input class="form-control" type="email" name="email" placeholder="">
            <input class="form-control" type="password" name="password" placeholder="">
            <input type="submit" class="btn btn-success" value="Login">
        </form>
           
        
    <form action="/auth/register" method="POST" class="form-group">
        <input class="form-control" type="email" name="email" placeholder="example@email.com">
        <input class="form-control" type="password" name="password" placeholder="Password">
        <input type="submit" class="btn btn-success" value="Register">
    </form>
    {/if}

    
    
  


 
  {if !isset($smarty.session.user)}
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Registered At</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
             {if isset($users)}
                   {foreach from=$users item=user}
                <tr>
                    <td><a href="/user/info/{$user['id']}">{$user['id']}</a></td>
                    <td>{$user['email']}</td>
                    <td>{$user['created_at']}</td>
                    <td><a href="/user/delete/{$user['id']}" class="btn btn-danger">Remove</a></td>
                </tr>
                {/foreach}
            {/if}
          
            
            
        </tbody>
    </table>
    {else}
           <form action="/post/create" method="POST" class="form-group">
               
            <input class="form-control" type="text" name="title" placeholder="Enter the title" style="margin-bottom: 10px;">
            
            <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3" placeholder="enter the text"></textarea>
            </div>
            
            <input type="submit" class="btn btn-success" value="Submit">
            
        </form>
 
    {/if}
{/block}
