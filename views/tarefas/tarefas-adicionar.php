<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Adicionar Tarefa | Gerenciador de Tarefas</title>
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
            <div class="main_container">
                <div class="row-fluid">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo HOME_URI; ?>/tarefas/index">Página Inicial</a> <span class="divider">/</span></li>
                        <li class="active"><p>Adicionar Tarefa</p></li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="widget widget-padding span12">
                        <div class="widget-header">
                            <i class="icon-plus"></i><h5>Adicionar Tarefa</h5>
                            <div class="widget-buttons">
                                <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-forms clearfix">
                                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" onsubmit="return validaCadastrarTarefa(this);">
                                    <?php if (isset($mensagem)): ?>
                                        <div class="note note-success">
                                            <h4 class="block">
                                                <?php echo $mensagem ?>
                                            </h4>
                                        </div>
                                    <?php endif; ?>

                                    <div class="control-group">
                                        <label class="control-label">Título da Tarefa</label>
                                        <div class="controls">
                                            <input class="span12" type="text" placeholder="Escreva o título da tarefa" name="titulo" required="required" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Descrição</label>
                                        <div class="controls">
                                            <textarea class="span12 ckeditor" rows="5" style="height:100px;" name="descricao"></textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="span4">
                                            <label class="control-label">Responsável</label>
                                            <div class="controls">
                                                <div class="ui-widget">
                                                    <select id="combobox" name="tb_usuarios_id" data-placeholder="Selecione..." class="span4" required="required">
                                                        <option value="">Selecione...</option>
                                                        <?php foreach ($view2 as $param): ?>
                                                            <option value="<?php echo $param['id']; ?>"><?php echo $param['nome']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            <!-- <select name="tb_usuarios_id" data-placeholder="Selecione..." class="span4">
                                                <option value="">Selecione...</option>
                                                <?php foreach ($view2 as $param): ?>
                                                    <option value="<?php echo $param['id']; ?>"><?php echo $param['nome']; ?></option>
                                                <?php endforeach; ?>
                                            </select> -->
                                        </div>
                                    </div>

                                    <div class="span4">
                                        <label class="control-label">Tipo de Tarefa</label>
                                        <div class="controls">
                                            <div class="ui-widget">
                                                <select id="combobox2" name="tb_tarefas_tipo_id" data-placeholder="Selecione..." class="span4" required="required">
                                                    <option value="">Selecione...</option>
                                                    <?php foreach ($view3 as $param): ?>
                                                        <option value="<?php echo $param['id']; ?>"><?php echo $param['tipo']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <!-- <select name="tb_tarefas_tipo_id" data-placeholder="Selecione..." class="span4">
                                                <option value=""> Selecione...</option>
                                                <?php foreach ($view3 as $param): ?>
                                                    <option value="<?php echo $param['id']; ?>"><?php echo $param['tipo']; ?></option>
                                                <?php endforeach; ?>
                                            </select> -->
                                        </div>
                                    </div>


                                    <div class="span4">
                                        <label class="control-label">Projetos</label>
                                        <div class="controls">
                                            <div class="ui-widget">
                                                <select id="combobox3" name="tb_projetos_id" data-placeholder="Selecione..." class="span4" required="required">
                                                    <option value="">Selecione...</option>
                                                    <?php foreach ($view4 as $param): ?>
                                                        <option value="<?php echo $param['id']; ?>"><?php echo $param['nome']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <!-- <select name="tb_projetos_id" data-placeholder="Selecione..." class="span4">
                                                <option value="">Selecione...</option>
                                                <?php foreach ($view4 as $param): ?>
                                                    <option value="<?php echo $param['id']; ?>"><?php echo $param['nome']; ?></option>
                                                <?php endforeach; ?>
                                            </select> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">

                                </div>
                                <div class="control-group">

                                </div>


                                <input type="hidden" name="data_cadastro" value="<?php echo date("Y-m-d"); ?>"/> 
                                <input type="hidden" name="hora_cadastro" value="<?php echo date("H:i"); ?>"/> 
                                <input type="hidden" name="status" value="2"/> 
                                <input type="submit" name="submit" class="btn btn-primary" value="Adicionar Tarefa"/>
                            </form>
                        </div>
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