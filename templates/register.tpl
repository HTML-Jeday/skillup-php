{extends file="layout.tpl"}

{block name="body"}

    <h3>Regsiter</h3>

    {if isset($smarty.get.error)}
        <div class="alert alert-danger" role="alert">{{$smarty.get.error}}</div>
    {/if}

    <form action="/?action=register" method="POST" style="width: 400px">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-success">Register</button>
    </form>

    <div>
        Already registered? <a href="/?action=login">Login!</a>
    </div>


{/block}