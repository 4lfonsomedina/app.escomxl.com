<div class="row">
	<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="panel panel-primary">
		<div class="panel-body">
			<form method="POST" action="<?= site_url('Dashboard') ?>">
				<div class="col-md-4">
					Centro de carga
				<select class="form-control" name="id_cliente">
					<?php foreach($clientes as $c){?>
					<option value="<?= $c->id_cliente ?>" 
					<?php if(isset($cliente)&&$cliente->id_cliente==$c->id_cliente){echo "selected";}?>>
						<?= "(".$c->nombre.") ".$c->nombre_fiscal ?>		
					</option>
					<?php } ?>
				</select>
				</div>
				<div class="col-md-3">
					Periodo
				<input class="form-control" type="date" name="fecha1" value="<?= $fecha1 ?>">
				</div>
				<div class="col-md-3">
					<br>
				<input class="form-control" type="date" name="fecha2" value="<?= $fecha2 ?>">
				</div><div class="col-md-2">
					<br>
					<button class="btn btn-primary aw_loader">Consultar</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

<?php if(isset($cliente)){ ?>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
<div class="panel panel-primary">
	<div class="panel-heading">
		<h2 align="center"><?= $cliente->nombre." - ".$cliente->nombre_fiscal ?></h2>
	</div>

	<div class="panel-body">
<?php 	$total_resumen=0;
		$total_oferta=0;
		foreach ($cliente->resumen as $r)if($r->producto!=0){$total_resumen+=$r->producto; $total_oferta+=$r->oferta;} ?>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-primary">
		<div class="panel-body">
			<h3>
				<b><i class="fa fa-plug"></i> TotalMW:</b> <?= round($total_resumen,4) ?>
			</h3>
		</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-primary">
		<div class="panel-body">
			<h3>
				<b><i class="fa fa-line-chart"></i> OfertaMDA:</b> <?= round($total_oferta,4) ?>
			</h3>
		</div>
		</div>
	</div>
</div>

<!-- RESUMEN -->
<div class="row">
		<div class="col-md-12">
			<canvas id="chart_c<?= $cliente->id_cliente ?>" style="height: 250px;"></canvas>
		</div>
		<div class="col-md-12">
			<table class="table data_table_1">
			<thead>
				<tr>
					<th>FECHA</th>
					<!--
					<th>MW</th>
					<th>MWFACTOR</th>
					-->
					<th>MW</th>
					<th>MDA</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($cliente->resumen as $r)if($r->producto!=0){ ?>
				<tr>
					<td data-sort="<?= $r->fecha ?>"><?= $r->fecha ?></td>
					<!--
					<td><?= $r->mw ?></td>
					<td><?= $r->mwfactor ?></td>
					-->
					<td><?= $r->producto ?></td>
					<td><?= $r->oferta ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		</div>
</div>


</div>
</div><!--Panel-->
</div>
</div>
<?php } ?>

<script>
	jQuery(document).ready(function($) {
		cargar_graficas_calculos();
	});

		function cargar_graficas_calculos(){
			console.log("Cargando graficas de calculos");
            var f<?= $cliente->id_cliente ?> = document.getElementById("chart_c<?= $cliente->id_cliente ?>");
            

            new Chart(f<?= $cliente->id_cliente ?>, {
                type: "line",
                data: {
                    labels: [
<?php foreach ($cliente->resumen as $r)if($r->producto!=0){ 
	echo '"'.explode('-',$r->fecha)[2].'/'.explode('-',$r->fecha)[1].'",';
}?>
					],
                datasets: [{
                    label: "MW",
                    backgroundColor: "rgba(255, 130, 0, .1)",
                    borderColor: "rgba(255, 130, 0, 1)",
                    pointBorderColor: "rgba(255, 130, 0, 1)",
                    pointBackgroundColor: "rgba(255, 130, 0, 0.5)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(0, 131, 227,1)",
                    pointBorderWidth: 2,
                    data: [
                    <?php foreach ($cliente->resumen as $r)if($r->producto!=0){ ?>
                    <?= $r->producto ?>,
                	<?php }?>
                	]},
                	{
                    label: "MDA",
                     backgroundColor: "rgba(255, 230, 0, 0)",
                    borderColor: "rgba(255, 230, 0, 1)",
                    pointBorderColor: "rgba(255, 230, 0, 1)",
                    pointBackgroundColor: "rgba(255, 230, 0, 0.5)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(0, 131, 227,1)",
                    pointBorderWidth: 2,
                    data: [
                    <?php foreach ($cliente->resumen as $r)if($r->oferta!=0){ ?>
                    <?= $r->oferta ?>,
                	<?php }?>
                	]},/*
                	{
                    label: "MW",
                    backgroundColor: "rgba(102, 102, 102, 0.02)",
                    borderColor: "rgba(102, 102, 102, 1)",
                    pointBorderColor: "rgba(102, 102, 102, 1)",
                    pointBackgroundColor: "rgba(102, 102, 102, 0.5)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(102,102,102,1)",
                    pointBorderWidth: 2,
                    data: [
                    <?php foreach ($cliente->resumen as $r)if($r->mw!=0){ ?>
                    <?= $r->mw ?>,
                	<?php }?>
                	]},
                	{
                    label: "MWFACTOR",
                    backgroundColor: "rgba(219, 133, 1, 0.02)",
                    borderColor: "rgba(219, 133, 1, 1)",
                    pointBorderColor: "rgba(219, 133, 1, 1)",
                    pointBackgroundColor: "rgba(219, 133, 1, 0.5)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(219, 133, 1,,1)",
                    pointBorderWidth: 2,
                    data: [
                    <?php foreach ($cliente->resumen as $r)if($r->mwfactor!=0){ ?>
                    <?= $r->mwfactor ?>,
                	<?php }?>
                	]} */

                	]
                }
            })
            /*
            setTimeout(function(){
            	calcular_concepto(0);
            },2000)
            */
        }

        
</script>