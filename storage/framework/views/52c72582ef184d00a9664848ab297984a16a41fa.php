
<header>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
	
    <div class="navbar-header">
        <a href="<?php echo e(route ('dashboard')); ?>"><img src="http://localhost/laravel2/public/img/Not.png" style="    clear: left;  float: left;  margin-left: 0px;  margin-right: 50px;"></a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav navbar-right">
	    <li><a href="<?php echo e(route ('history')); ?>">History</a></li>
        <li><a href="<?php echo e(route ('account')); ?>">Account</a></li>
        <li><a href="<?php echo e(route ('logout')); ?>">Logout</a></li>
       
      </ul>  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</header>