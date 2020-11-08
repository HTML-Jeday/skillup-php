{extends file="layout.tpl"}
{block name=body}
    {{$time}}
    
  
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Text</th>
            <th>Author</th>
            <th>Created At</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
            
       
                {foreach from=$posts item=post}
                <tr>
                    <td>{$post['id']}</td>
                    <td>{$post['title']}</td>
                    <td>{$post['text']}</td>
                    <td>{$post['author']}</td>
                    <td>{$post['created_at']}</td>
                    <td>
                        <a href="/post/update/{$post['id']}" class="btn btn-primary">Edit</a>
                        <a href="/post/delete/{$post['id']}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                {/foreach}
      
          
            
            
        </tbody>
    </table>

{/block}
