<?php $__env->startSection("content"); ?>

<header class="big-padding text-center blue-grey white-text">
	<h1>Compra completada</h1>
</header>
<!--text-center $shopping_cart = shopping_cart-->

<div class="container large-padding">
	<div class="card large-padding ">
		<h3 class="text-center">Tu pago fue procesado <span  class="<?php echo e($order->status); ?>">
			<?php echo e($order->status); ?></span></h3>
		<p class="top-space padding-top">Comprueba los detalles de tu envio:</p>

		<div class="row large-padding top-space padding-top">
			<div class="col-xs-4">Correo</div>
			<div class="col-xs-4"> <?php echo e($order->email); ?> </div>
		</div>
		<div class="row large-padding top-space padding-top">
			<div class="col-xs-4">Direción</div>
			<div class="col-xs-4"> <?php echo e($order->address()); ?> </div>
		</div>
		<div class="row large-padding top-space padding-top">
			<div class="col-xs-4">Codigo Postal</div>
			<div class="col-xs-4"> <?php echo e($order->postal_code); ?> </div>
		</div>
		<div class="row large-padding top-space padding-top">
			<div class="col-xs-4">Ciudad</div>
			<div class="col-xs-4"> <?php echo e($order->city); ?> </div>
		</div>
		<div class="row large-padding top-space padding-top">
			<div class="col-xs-4">Estado y Pais</div>
			<div class="col-xs-4"> <?php echo e("$order->state $order->country_code"); ?> </div>
		</div>
		<div class="text-center top-space">
			<a href="<?php echo e(url('/compras/'.$shopping_cart->customid)); ?>">Link permanente de tu compra</a>

		</div>

	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>