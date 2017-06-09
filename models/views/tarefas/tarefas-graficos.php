<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Gráficos de Tarefas | Gerenciador de Tarefas</title>
	<?php require_once 'views/_include/head.php'; ?>
	<?php require_once MODELS . '/Login/Login.class.php'; ?>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<style>
		.custom-combobox {
			position: relative;
			display: inline-block;
			width: 100%;
		}
		.custom-combobox-toggle {
			position: absolute;
			top: 0;
			bottom: 0;
			margin-left: -1px;
			padding: 0;
		}
		.custom-combobox-input {
			margin: 0;
			padding: 5px 10px;
			width: 100%;
		}
	</style>
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
												<div class="ui-widget">
													<select id="combobox" name="tb_tarefas_tipo_id" class="form-control agenda" style="width: 100%; margin: 10px 0px;"  required="required">
														<option value="">Selecione...</option>
														<?php foreach ($view as $param): ?>
															<option value="<?php echo $param['id']; ?>"><?php echo $param['tipo']; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<input type="submit" name="submit-tipo-tarefa" value="Filtrar" class="btn btn-default margin-filtro" style="width: 100%; background: #292a2f; color: #fff; border: none; margin: 5px 0px;" />
										</div>
									</form>
								</div>
								<div class="span6">
									<form action="" method="post" class="form-inline" role="form" onsubmit="return validaGeralCategoria(this);">
										<div class="form-group" style="width: 100%; padding: 10px 15px;">
											<label style="font-size: 16px; font-weight: bold; color: #62687E; display: block; width: 100%">Usuários</label>
											<div class="input-icon" style="width: 100%">
												<div class="ui-widget">
													<select id="combobox1" name="tb_usuario_id" class="form-control agenda" style="width: 100%; margin: 10px 0px;"  required="required">
														<option value="">Selecione...</option>
														<?php foreach ($view2 as $param): ?>
															<option value="<?php echo $param['id']; ?>"><?php echo $param['nome']; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<input type="submit" name="submit-usuario" value="Filtrar" class="btn btn-default margin-filtro" style="width: 100%; background: #292a2f; color: #fff; border: none; margin: 5px 0px;" />
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

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$( function() {
			$.widget( "custom.combobox", {
				_create: function() {
					this.wrapper = $( "<span>" )
					.addClass( "custom-combobox" )
					.insertAfter( this.element );

					this.element.hide();
					this._createAutocomplete();
					this._createShowAllButton();
				},

				_createAutocomplete: function() {
					var selected = this.element.children( ":selected" ),
					value = selected.val() ? selected.text() : "";

					this.input = $( "<input>" )
					.appendTo( this.wrapper )
					.val( value )
					.attr( "title", "" )
					.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: $.proxy( this, "_source" )
					})
					.tooltip({
						classes: {
							"ui-tooltip": "ui-state-highlight"
						}
					});

					this._on( this.input, {
						autocompleteselect: function( event, ui ) {
							ui.item.option.selected = true;
							this._trigger( "select", event, {
								item: ui.item.option
							});
						},

						autocompletechange: "_removeIfInvalid"
					});
				},

				_createShowAllButton: function() {
					var input = this.input,
					wasOpen = false;

					$( "<a>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Mostrar tudo" )
					.tooltip()
					.appendTo( this.wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "custom-combobox-toggle ui-corner-right" )
					.on( "mousedown", function() {
						wasOpen = input.autocomplete( "widget" ).is( ":visible" );
					})
					.on( "click", function() {
						input.trigger( "focus" );

            // Close if already visible
            if ( wasOpen ) {
            	return;
            }

            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
        });
				},

				_source: function( request, response ) {
					var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
					response( this.element.children( "option" ).map(function() {
						var text = $( this ).text();
						if ( this.value && ( !request.term || matcher.test(text) ) )
							return {
								label: text,
								value: text,
								option: this
							};
						}) );
				},

				_removeIfInvalid: function( event, ui ) {

        // Selected an item, nothing to do
        if ( ui.item ) {
        	return;
        }

        // Search for a match (case-insensitive)
        var value = this.input.val(),
        valueLowerCase = value.toLowerCase(),
        valid = false;
        this.element.children( "option" ).each(function() {
        	if ( $( this ).text().toLowerCase() === valueLowerCase ) {
        		this.selected = valid = true;
        		return false;
        	}
        });

        // Found a match, nothing to do
        if ( valid ) {
        	return;
        }

        // Remove invalid value
        this.input
        .val( "" )
        .attr( "title", value + " não obteve resultados" )
        .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
        	this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
    },

    _destroy: function() {
    	this.wrapper.remove();
    	this.element.show();
    }
});

			$( "#combobox" ).combobox();
			$( "#combobox1" ).combobox();
			$( "#combobox2" ).combobox();
			$( "#combobox3" ).combobox();
			$( "#toggle" ).on( "click", function() {
				$( "#combobox" ).toggle();
			});
		} );
	</script>
</body>
</html>