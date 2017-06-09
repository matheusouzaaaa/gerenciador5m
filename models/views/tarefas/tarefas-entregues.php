<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Relatório do Usuário | Gerenciador de Tarefas</title>
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
                        <li class="active"><p>Relatório do Usuário</p></li>
                    </ul>
                </div>

                <div class="row-fluid">
                    <div class="widget span12">
                        <div class="widget-header">
                            <i class="icon-tasks"></i>
                            <h5>Filtros</h5>
                        </div>
                        <div class="widget-body clearfix">
                            <div class="widget-tasks-assigned">
                                <div class="span3">
                                    <form action="" method="post" class="form-inline" role="form" onsubmit="return validaGeralCategoria(this);">
                                        <div class="form-group" style="width: 100%; padding: 10px 15px;">
                                            <label style="font-size: 16px; font-weight: bold; color: #62687E; display: block; width: 100%">Tipo de Tarefa</label>
                                            <div class="input-icon" style="width: 100%">
                                                <i class="fa fa-calendar-o"></i>
                                                <div class="ui-widget">
                                                    <select id="combobox" name="tb_tarefas_tipo_id" class="form-control agenda" style="width: 100%; margin: 10px 0px;"  required="required">
                                                        <option value="">Selecione...</option>
                                                        <?php foreach ($view3 as $param): ?>
                                                            <option value="<?php echo $param['id']; ?>"><?php echo $param['tipo']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="submit" name="submit-tipo-tarefa" value="Filtrar" class="btn btn-default margin-filtro" style="width: 100%; background: #292a2f; color: #fff; border: none; margin: 5px 0px" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="widget span12">
                        <div class="widget-header">
                            <i class="icon-tasks"></i>
                            <h5>Tarefas em Andamento</h5>
                        </div>
                        <div class="widget-body clearfix">
                            <div class="widget-tasks-assigned">
                                <ul>
                                    <?php foreach ($view as $param): ?>
                                        <li class="priority-high-left">
                                            <div class="content">
                                                <h5>#<?php echo $param['id']; ?> <?php echo $param['titulo']; ?></h5>
                                                <span><strong>Data e hora de Cadastro:</strong> <?php echo dataBR($param['data_cadastro']); ?> às <?php echo horaBR($param['hora_cadastro']). ":" . minBR($param['hora_cadastro']); ?> | <strong>Responsável:</strong> <?php echo $param['nome_usuario']; ?></span>
                                            </div>
                                            <ul class="rightboxes">
                                                <li>
                                                    <a href="<?php echo HOME_URI . "/tarefas/tarefa/" . $param['id']; ?>">
                                                        Ver Detalhes da tarefa
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="widget span12">
                        <div class="widget-header">
                            <i class="icon-tasks"></i>
                            <h5>Tarefas Entregues</h5>
                        </div>
                        <div class="widget-body clearfix">
                            <div class="widget-tasks-assigned">
                                <ul>
                                    <?php foreach ($view2 as $param): ?>
                                        <li class="priority-low-left">
                                            <?php $id = $param['id']; ?>
                                            <div class="content">
                                                <h5>
                                                    #<?php echo $param['id']; ?> <?php echo $param['titulo']; ?>
                                                </h5>
                                                <span>
                                                    <strong>Período</strong> de <?php echo dataBR($param['data_cadastro']); ?> até <?php echo dataBR($param['data_final']); ?> |
                                                    <strong>Hora Cadastro:</strong> <?php echo horaBR($param['hora_cadastro']). ":" . minBR($param['hora_cadastro']); ?> |
                                                    <strong>Hora Final:</strong> <?php echo horaBR($param['hora_final']). ":" . minBR($param['hora_final']); ?> |
                                                    <strong>Responsável da Tarefa: </strong> <?php echo $param['nome_usuario']; ?>
                                                </span>
                                            </div>
                                            <ul class="rightboxes1">
                                                <li>
                                                    <a href="<?php echo HOME_URI . "/tarefas/finalizada/" . $param['id']; ?>">
                                                        Mais informações
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <!-- /Main window -->

        </div><!--/.fluid-container-->
    </div><!-- wrap ends-->

    <?php require INCLUSAO . '/footer.php'; ?>
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
        .attr( "title", value + " didn't match any item" )
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