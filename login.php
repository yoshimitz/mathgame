<?php session_start(); ?>
<?php include("include/header.php"); ?>
<header>
    <h1>Please login to enjoy our math game.</h1>
</header>
<form action="auth.php" method="post" role="form" class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-xs-4" for="email">Email: </label>
        <div class="col-xs-4">
            <input type="email" class="form-control" name="email" id="email"  placeholder="Email" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-4" for="password">Password: </label>
        <div class="col-xs-4">
            <input type="password" class="form-control" name="password" id="password"  placeholder="Password" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-4 col-xs-6">
            <input type="submit" name="login" value="Login" class="btn btn-primary" />
        </div>
    </div>  
</form>
<div class="error">
    <?php 
    $message;
    if (!empty($_GET['message'])) {
        $message = $_GET['message'];
         echo $message;
    }
    ?>
    
</div>
<?php include("include/footer.php"); ?>