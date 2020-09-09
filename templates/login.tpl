{extends file="layout.tpl"}

{block name="body"}


    <h3>Login</h3>

    {if isset($smarty.get.error)}
        <div class="alert alert-danger" role="alert">{{$smarty.get.error}}</div>
    {/if}

    <form action="/?action=login" method="POST" style="width: 400px">
        <div class="form-group">
            <label for="cat_name">Email address</label>
            <input type="email" class="form-control" id="cat_name" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-success">Login</button>
    </form>

    <div>
        Do not have an account? <a href="/?action=register">Register now!</a>
    </div>


{/block}