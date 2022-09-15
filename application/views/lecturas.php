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


<div class="row">
	<div class="col-md-2"></div>
<?php

if(isset($cliente)){
?>

<div class="col-md-8">
	<div class="panel panel-primary">
		<div class="panel-heading"><?= $cliente->rmu." - ".$cliente->nombre ?></div>
		<div class="panel-body">
			<div class="row">
			<div class="col-md-12">
				<canvas id="chart_c<?= $c->id_cliente ?>" style="height: 250px;"></canvas>
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				<br><br>
				<table class="table data_table_1">
					<thead>
					<tr>
						<th>Fecha</th>
						<th>kvarh</th>
						<th>kwhe</th>
						<th>kwhr</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($lecturas as $l){?>
					<tr>
						<td><?= $l->fecha ?></td>
						<td><?= number_format($l->kvarh,6) ?></td>
						<td><?= number_format($l->kwhe,6) ?></td>
						<td><?= number_format($l->kwhr,6) ?></td>
					</tr>
					<?php }?>
					</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>

</div>


<script>
		function cargar_graficas(){
			console.log("cargando graficas");
			<?php if(isset($cliente)){ ?>
            var f<?= $cliente->id_cliente ?> = document.getElementById("chart_c<?= $c->id_cliente ?>");
            new Chart(f<?= $cliente->id_cliente ?>, {
                type: "line",
                data: {
                	
                    labels: [<?php foreach($lecturas as $l){ echo '"'.$l->fecha.'",';}?>],
                    datasets: [{
                        label: "kvarh",
                        backgroundColor: "rgba(255, 232, 0, 1)",
                        borderColor: "rgba(233,84,32,1)",
                        pointBorderColor: "rgba(233,84,32,1)",
                        pointBackgroundColor: "rgba(233,84,32,1)",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(151,187,205,1)",
                        pointBorderWidth: 1,
                        data: [
                        <?php foreach($lecturas as $l){?>
                        <?= $l->kvarh ?>,
                    	<?php }?>
                    	]}, 
                    	{
                        label: "kwhe",
                        backgroundColor: "rgba(255, 174, 0, .7)",
                        borderColor: "rgba(233,84,32,1)",
                        pointBorderColor: "rgba(233,84,32,1)",
                        pointBackgroundColor: "rgba(233,84,32,1)",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(151,187,205,1)",
                        pointBorderWidth: 1,
                        data: [
                        <?php foreach($lecturas as $l){?>
                        <?= $l->kwhe ?>,
                    	<?php }?>
                        ]
                    }, 
                    	{
                        label: "kwhr",
                        backgroundColor: "rgba(255, 100, 0, 0.7)",
                        borderColor: "rgba(233,84,32,1)",
                        pointBorderColor: "rgba(233,84,32,1)",
                        pointBackgroundColor: "rgba(233,84,32,1)",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(3, 179, 75, 1)",
                        pointBorderWidth: 1,
                        data: [
                        <?php foreach($lecturas as $l){?>
                        <?= $l->kwhr ?>,
                    	<?php }?>
                        ]
                    }]
                }

            })
        <?php } ?>

        }

    function selectElementContents(el) {
	    var body = document.body, range, sel;
	    if (document.createRange && window.getSelection) {
	        range = document.createRange();
	        sel = window.getSelection();
	        sel.removeAllRanges();
	        try {
	            range.selectNodeContents(el);
	            sel.addRange(range);
	        } catch (e) {
	            range.selectNode(el);
	            sel.addRange(range);
	        }
	    } else if (body.createTextRange) {
	        range = body.createTextRange();
	        range.moveToElementText(el);
	        range.select();
	    }
	   document.execCommand("copy");
	   alert("5minutal copiado en tu portapapeles...");
	   window.getSelection().removeAllRanges();
	}

</script>