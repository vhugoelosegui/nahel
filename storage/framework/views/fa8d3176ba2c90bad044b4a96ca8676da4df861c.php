<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

		<title><?php echo e(config('app.name', 'Nahel')); ?></title>

		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.min.css" />
		<link href="<?php echo e(url('/css/app.css')); ?>" rel="stylesheet">

		<!-- Scripts -->
		<script>
				window.Nahel = <?php echo json_encode([
						'csrfToken' => csrf_token(),
				]); ?>
		</script>
</head>
<body>
		<div id="app">
				<nav class="navbar navbar-inverse navbar-static-top">
						<div class="container">
								<div class="navbar-header">

										<!-- Collapsed Hamburger -->
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
												<span class="sr-only">Toggle Navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
										</button>

										<!-- Branding Image -->
										<a class="navbar-brand" href="<?php echo e(url('/')); ?>">
												Nahel
										</a>
								</div>

								<div class="collapse navbar-collapse" id="app-navbar-collapse">
										<!-- Left Side Of Navbar -->
										<ul class="nav navbar-nav">
												&nbsp;
										</ul>

										<!-- Right Side Of Navbar -->
										<ul class="nav navbar-nav navbar-right">
												<!-- Authentication Links -->
												<li>
													<a href="<?php echo e(url("/carrito")); ?>">
														Mi carrito
													<span class="circle-shopping-cart">
														<?php echo e($productsCount); ?>

													</span>
												</a>
													
												</li>
												<?php if(Auth::guest()): ?>
														<li><a href="<?php echo e(url('/login')); ?>">Iniciar session</a></li>
														<li><a href="<?php echo e(url('/register')); ?>">Registrar</a></li>
												<?php else: ?>
														<li>
															<a href="<?php echo e(url('/logout')); ?>"
																onclick="event.preventDefault();
															 document.getElementById('logout-form').submit();">
																						cerrar session
															</a>
															<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
																<?php echo e(csrf_field()); ?>

															</form>
														</li>
												<?php endif; ?>
										</ul>
								</div>
						</div>
				</nav>

				<?php echo $__env->yieldContent('content'); ?>
		</div>

		<!-- Scripts -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js"></script>
  <script >
  	$.material.init();
  </script>
  <script src="<?php echo e(url('/js/app.js')); ?>"></script>
</body>
</html>
