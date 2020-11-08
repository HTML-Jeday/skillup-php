{extends file="layout.tpl"}
{block name=body}
    
    
   
  
         <form action="/post/edit" method="POST" class="form-group">
             

               
            <input class="form-control" type="text" name="title" placeholder="{$post->getTitle()}" value="{$post->getTitle()}" style="margin-bottom: 10px; margin-top: 10px;" >
            
            <div class="form-group">
                <input class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"  value="{$post->getText()}" >
            </div>
            <input type="hidden" name="id" value="{$post->getId()}}">
            
            <input type="submit" class="btn btn-success" value="Submit">
            
        </form>

{/block}
