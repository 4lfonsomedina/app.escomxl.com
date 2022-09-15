<div class="col-md-12" align="center"><h1>Centros de carga activos<br><br></h1></div>

<?php foreach($clientes as $c){?>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="panel panel-primary">
		<div class="panel-body">
			<div class="row">
			<div class="col-md-10">
				<h3><?= '('.$c->nombre.') '.$c->nombre_fiscal ?></h3>
				<div class="col-md-12">
					<p>ID medidor: <?= $c->rmu ?></p>
				</div>
				<div class="col-md-12">
					<p>Inicio de operaciones: <?= $c->fecha_inicio ?></p>
				</div>
			</div>
			<div class="col-md-2">
				<form action="<?= site_url('Dashboard') ?>" method="post">
					<input type="hidden" name="fecha1" value="<?= date('Y-m-')."01" ?>">
					<input type="hidden" name="fecha2" value="<?= date('Y-m-d') ?>">
					<input type="hidden" name="id_cliente" value="<?= $c->id_cliente ?>">
				<button type="submit" class="btn btn-primary aw_loader" style="width: 100%;"><i class="fa fa-area-chart"></i><br>Consumo</button>
				</form>
			</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php }?>