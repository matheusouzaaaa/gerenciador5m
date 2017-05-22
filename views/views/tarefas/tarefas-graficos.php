<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Gráficos de Tarefas | Gerenciador de Tarefas</title>
	<?php require_once 'views/_include/head.php'; ?>
	<?php require_once MODELS . '/Login/Login.class.php'; ?>
</head>

<body>
	<div id="wrap">
		<?php require INCLUSAO . '/nav.php'; ?>

		<div class="container-fluid">

			<?php require INCLUSAO . '/menu.php'; ?>

			<!-- Main window -->
			<div class="main_container" id="dashboard_page">

				<div class="row-fluid">
					<ul class="breadcrumb">
						<li><a href="<?php echo HOME_URI; ?>/tarefas/index">Página Inicial</a> <span class="divider">/</span></li>
						<li class="active"><p>Gráficos de Tarefas Entregues</p></li>
					</ul>
				</div>

				<div class="row-fluid">
					<div class="widget span12">
						<div class="widget-header">
							<i class="icon-signal"></i>
							<h5>Filtro dos Gráficos</h5>
							<div class="widget-buttons">
								<a href="javascript: history.go(-1)"><i class="icon-reply"></i> Voltar</a>
							</div>
						</div>
						<div class="widget-body clearfix">
							<div class="widget-tasks-assigned">
								<div class="span6">
									<form action="" method="post" class="form-inline" role="form" onsubmit="return validaGeralCategoria(this);">
										<div class="form-group" style="width: 100%; padding: 10px 15px;">
											<label style="font-size: 16px; font-weight: bold; color: #62687E; display: block; width: 100%">Tipo de Tarefa</label>
											<div class="input-icon" style="width: 100%">
												<i class="fa fa-calendar-o"></i>
												<select name="tb_tarefas_tipo_id" class="form-control agenda" style="width: 100%; margin: 10px 0px;">
													<option value="" selected=""> Selecione...</option>
													<?php foreach ($view as $param): ?>
														<option value="<?php echo $param['id']; ?>"><?php echo $param['tipo']; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<input type="submit" name="submit-tipo-tarefa" value="Filtrar" class="btn btn-default margin-filtro" style="width: 100%; background: #292a2f; color: #fff; border: none;" />
										</div>
									</form>
								</div>
								<div class="span6">
									<form action="" method="post" class="form-inline" role="form" onsubmit="return validaGeralCategoria(this);">
										<div class="form-group" style="width: 100%; padding: 10px 15px;">
											<label style="font-size: 16px; font-weight: bold; color: #62687E; display: block; width: 100%">Usuários</label>
											<div class="input-icon" style="width: 100%">
												<i class="fa fa-calendar-o"></i>
												<select name="tb_usuario_id" class="form-control agenda" style="width: 100%; margin: 10px 0px;">
													<option value="" selected=""> Selecione...</option>
													<?php foreach ($view2 as $param): ?>
														<option value="<?php echo $param['id']; ?>"><?php echo $param['nome']; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<input type="submit" name="submit-usuario" value="Filtrar" class="btn btn-default margin-filtro" style="width: 100%; background: #292a2f; color: #fff; border: none;" />
										</div>
									</form>
								</div>

							</div>
						</div>
						<!-- <canvas id="myChart" width="200" height="200"></canvas> -->
					</div>
				</div>

				<div class="row-fluid">
					<div class="widget span12">
						<div class="widget-header">
							<i class="icon-tasks"></i>
							<h5>Gráfico por Tipo de Tarefa</h5>
						</div>
						<div class="widget-body clearfix">
							<div class="widget-tasks-assigned">
								<canvas id="myChart" width="200" height="200"></canvas>
							</div>
						</div>
					</div>
				</div>

				<div class="row-fluid">
					<div class="widget span12">
						<div class="widget-header">
							<i class="icon-tasks"></i>
							<h5>Gráfico por Usuário</h5>
						</div>
						<div class="widget-body clearfix">
							<div class="widget-tasks-assigned">
								<canvas id="myChart1" width="200" height="200"></canvas>
							</div>
						</div>
					</div>
				</div>


			</div>
			<!-- /Main window -->

		</div><!--/.fluid-container-->
	</div><!-- wrap ends-->



	<?php require INCLUSAO . '/footer.php'; ?>


	


	<script>
		var ctx = document.getElementById("myChart");
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [<?php foreach ($view3 as $param): ?><?php echo dataMes($param['mes_entrega']) ."," ?><?php endforeach; ?>],
				datasets: [{
					label: 'Tarefas Entregues',
					data: [<?php foreach ($view3 as $param): ?><?php echo $param['quantidade'] . "," ?><?php endforeach; ?>],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

	<script>
		var ctx1 = document.getElementById("myChart1");
		var myChart1 = new Chart(ctx1, {
			type: 'line',
			data: {
				labels: [<?php foreach ($view4 as $param): ?><?php echo dataMes($param['mes_entrega']) ."," ?><?php endforeach; ?>],
				datasets: [{
					label: 'Tarefas Entregues',
					data: [<?php foreach ($view4 as $param): ?><?php echo $param['quantidade'] . "," ?><?php endforeach; ?>],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>


</body>
</html>