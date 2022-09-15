<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="panel panel-primary">
	<div class="panel-body">
		<form action="<?= site_url("Facturacion") ?>" method="post">
			<div class="col-md-3"></div>
				<div class="col-md-3">
					<b>Mes</b>
					<select class="form-control" name="mes">
						<?php for($i=1;$i<=12;$i++){ $i2 = str_pad($i,2,'0',STR_PAD_LEFT);?>
							<option value="<?= $i2 ?>" <?php if($mes==$i2){echo "selected";}?>><?= $i2 ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-3">
					<b>Año</b>
					<select class="form-control" name="ano">
						<?php $yy = date('Y');?>
							<option value="<?= $yy ?>" <?php if($ano==$yy){echo "selected";}?>><?= $yy ?></option>
							<option value="<?= $yy-1 ?>" <?php if($ano==$yy-1){echo "selected";}?>><?= $yy-1 ?></option>
							<option value="<?= $yy-2 ?>" <?php if($ano==$yy-2){echo "selected";}?>><?= $yy-2 ?></option>
					</select>
				</div>
				<div class="col-md-3">
					<br>
					<button type="submit" class="btn btn-primary aw_loader" style="width: 100%;"><i class="fa fa-pie-chart"></i> Consultar </button>
				</div>
			</form>
	</div>
</div>
</div>
</div>

<?php if(isset($facturas)&&count($facturas)>0){?>
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="panel panel-primary">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<tr>
						<th></th>
						<th>CCarga</th>
						<th>Tipo</th>
						<th>Folio</th>
						<th>Moneda</th>
						<th style="text-align: right;">T.C.</th>
						<th style="text-align: right;">Subtotal</th>
						<th style="text-align: right;">IVA</th>
						<th style="text-align: right;">Total</th>
						<th style="text-align: right;">MXN</th>
					</tr>
					<?php 
					$total=0; 
					$total_mxn=0; 
					$total_usd=0; 
					$pago_encontrado=0;
					$total_nc=0;
					foreach ($facturas as $f){
						$f->total=round($f->total,2);
					}
					foreach ($facturas as $f)if($f->tipo=="nota_credito"){
						$total_nc+=round($f->total,2);
					}
					foreach ($facturas as $f){
						if($f->tipo=="nota_credito" || $f->tipo=="pago"){
							$f->subtotal=$f->subtotal*(-1);
							$f->iva_fac=round($f->iva_fac*(-1),2);
							$f->total=round($f->total*(-1),2);
						}

					$saldo_ant = round($f->total,2);

					$total+=round($f->total*$f->tc,2);
					
					if($f->moneda=='MXN'&&$f->tipo!='pago'){ 
						$total_parcial_mxn = $f->total;
						$total_mxn+=$f->total;
					}
					if($f->moneda=='USD'&&$f->tipo!='pago'){ 
						$total_parcial_usd = $f->total;
						$total_usd+=$f->total;
					}
					$nombre_xml=$f->id_cliente.'\\'.$f->serie.$f->folio.$f->id_cliente.$f->ano.str_pad($f->mes, 2, "0",STR_PAD_LEFT);
						?>
						<tr>
							<td>
								<a class="btn btn-success btn-sm" href="<?= esco_site_url('WS/Memapi/generar_pdf').$base.'?fuf='.$nombre_xml.'&tipo='.$f->tipo ?>" target="_blank">
									<i class="fa fa-file-pdf-o"></i> PDF </a>
					
									<a class="btn btn-info btn-sm" class="btn btn-success" href="<?= esco_site_url('WS/Memapi/descarga_factura').$base.'?fuf='.$nombre_xml.'&tipo=xml' ?>" target="_blank"><i class="fa fa-file-code-o"></i> XML </a>
							</td>
							<td><?php if($f->tipo!='pago'){echo $f->nombre;} ?></td>
							<td><?= $f->tipo ?></td>
							<td><?= $f->serie.$f->folio ?></td>
							<td><?= $f->moneda ?></td>
							<td style="text-align: right;">
									<?= number_format($f->tc,6) ?>
							</td>
							<td align="right"><?= number_format($f->subtotal,2) ?></td>
							<td align="right"><?= number_format($f->iva_fac,2) ?></td>
							<td align="right"><?= number_format($f->total,2) ?></td>
							<td align="right"><?= number_format($f->total*$f->tc,2) ?></td>
						</tr>
					<?php } ?>
				</table>

			</div>
		</div>
	</div>
		<div class="panel-footer">
			<div class="row">
				<div class="col-md-12">
				</div>
				<div class="col-md-4" style="text-align: right;">
					MXN <?= number_format($total_mxn,2) ?><br>
					USD <?= number_format($total_usd,2) ?><br>
					SALDO MXN <?= number_format($total,2) ?><br>
				</div>
			</div>
		</div>
</div>
</div>
<?php } ?>




<script type="text/javascript">
	$(document).ready(function() {

		

	});
</script>