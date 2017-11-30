<!--Formulario-->
<?php echo Form::open(['url' => $url, 'method'=> $method]); ?>


	<div class="form-group">
			<?php echo e(Form::text('title',$product->title,['class' => 'form-control','placeholder'=>'Titulo...'])); ?>

	</div>
		
	<div class="form-group">
			<?php echo e(Form::number('pricing',$product->pricing,['class' => 'form-control','placeholder'=>'Precio del producto '])); ?>

	</div>

	<div class="form-group">
			<?php echo e(Form::textarea('description',$product->description,['class' => 'form-control','placeholder'=>'Describe del producto.'])); ?>

	</div>
		
	<div class="form-group text-rigth"><a href="<?php echo e(url('/products')); ?>">Regresar al listado </a>
		<input type="submit" value="Enviar" class="btn btn-success">
	</div>


<?php echo Form::close(); ?>

