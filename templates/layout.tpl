<html>
<head>
    <title>{block name="title"}{/block}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            {if isset($smarty.session.user) && $smarty.session.user.is_admin === 1}
            <ul class="nav navbar-nav navbar-left">
                <li><a href="/?action=adminUsers">[A] Users</a></li>
                <li><a href="/?action=adminCategories">[A] Categories</a></li>
                <li><a href="/?action=adminProducts">[A] Products</a></li>
                <li><a href="/?action=adminOrders">[A] Orders</a></li>
            </ul>
            {/if}
            <ul class="nav navbar-nav navbar-right">

                    {if !isset($smarty.session.user)}
                    <li><a href="/?action=login">Login</a></li>
                    <li><a href="/?action=register">Register</a></li>
                    {/if}
                    <li><a href="/?action=cart">Cart (3)</a></li>

                {if isset($smarty.session.user)}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$smarty.session.user.email}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/?action=orders">Orders</a></li>
                        <li><a href="/?action=cart">Cart (3)</a></li>
                        <li><a href="/?action=logout">Logout</a></li>
                    </ul>
                </li>
                {/if}
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

    <div class="container">
        {block name=body}{/block}
    </div>

</body>
{block name="script"}{/block}
</html>