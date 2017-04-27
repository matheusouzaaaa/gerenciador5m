<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Lista de Tarefas | Gerenciador de Tarefas</title>
    <?php require_once 'views/_include/head.php'; ?>
    <?php require_once MODELS . '/Login/Login.class.php'; ?>
</head>

<body>
    <div id="wrap">
        <?php require INCLUSAO . '/nav.php'; ?>

        <div class="container-fluid">

            <?php require INCLUSAO . '/menu.php'; ?>

            <!-- Main window -->
            <div class="main_container" id="ui_page">
                <div class="row-fluid">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo HOME_URI; ?>/tarefas/index">Página Inicial</a> <span class="divider">/</span></li>
                        <li class="active"><p>Lista de Tarefas</p></li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="widget widget-padding span12">
                        <div class="widget-header">
                            <i class="icon-info-sign"></i>
                            <h5>Informações da Tarefa</h5>
                            <div class="widget-buttons">
                                <a href="javascript: history.go(-1)"><i class="icon-reply"></i> Voltar</a>
                            </div>
                        </div>  
                        <div class="widget-body row-fluid">
                            <?php foreach ($view as $param): ?>
                                <?php $id = $param['id']; ?>
                                <div class="info-tarefa">
                                    <div class="span8">
                                        <h4>
                                            #<?php echo $id; ?> - <?php echo $param['titulo']; ?>
                                        </h4>
                                        <span>
                                            <strong>Data:</strong> <?php echo dataBR($param['data_cadastro']); ?> até <?php echo dataBR($param['data_final']) ?> | 
                                            <strong>Hora:</strong> <?php echo horaBR($param['hora_cadastro']). ":" . minBR($param['hora_cadastro']); ?> até <?php echo horaBR($param['hora_final']). ":" . minBR($param['hora_final']); ?> | 
                                            <strong>Responsável:</strong> <?php echo $param['nome_usuario']; ?> 
                                            <br/> 
                                            <strong>Tipo de Tarefa:</strong> <?php echo $param['tipo']; ?> | 
                                            <strong>Projeto:</strong> <?php echo $param['nome_projeto']; ?>
                                        </span>
                                    </div>
                                    <div class="span4 info-horario">
                                        <h4>Tempo gasto na tarefa</h4>
                                        <div class="timer"></div>
                                    </div>
                                </div>
                                <div class="span12 margin-0">
                                    <h5>Descrição da Tarefa:</h5><br/>
                                    <textarea name="descricao" class="span12"  rows="5" style="height:100px;" readonly><?php echo $param['descricao']; ?></textarea>
                                </div>
                            <?php endforeach; ?>
                        </div><!--/widget-body-->
                    </div> <!-- /widget -->
                </div>
                <div class="row-fluid">
                    <div class="widget widget-padding span12">
                        <div class="widget-header">
                            <i class="icon-info-sign"></i>
                            <h5>Comentários da Tarefa</h5>
                        </div>

                        <?php foreach ($view2 as $param): ?>
                            <div class="widget-body row-fluid">
                                <p><strong>Nome:</strong> <?php echo $param['nome_comentario'] ?></p>
                                <p><strong>Comentário:</strong> <?php echo $param['comentario'] ?></p>
                            </div>
                        <?php endforeach; ?>

                    </div> <!-- /widget -->
                </div>
            </div><!--/main_container-->

        </div><!--/.fluid-container-->
    </div><!-- wrap ends-->

    <?php require INCLUSAO . '/footer.php'; ?>
    <script>
        var format = function (seconds) {
            var tempos = {
                segundos: 60
                , minutos: 60
                , horas: 24
                , dias: ''
            };
            var parts = [], string = '', resto, dias;
            for (var unid in tempos) {
                if (typeof tempos[unid] === 'number') {
                    resto = seconds % tempos[unid];
                    seconds = (seconds - resto) / tempos[unid];
                } else {
                    resto = seconds;
                }
                parts.unshift(resto);
            }
            dias = parts.shift();
            if (dias) {
                string = dias + (dias > 1 ? ' dias ' : ' dia ');
            }
            for (var i = 0; i < 3; i++) {
                parts[i] = ('0' + parts[i]).substr(-2);
            }
            string += parts.join(':');
            return string;
        };
        $(function () {
            var tempo = 0;
            var interval = 0;

            var tarefa_id = <?php echo $id ?>;
            var timer = function () {
                $('.timer').html(format(++tempo));
            };

            $.post('<?php echo HOME_URI; ?>/views/tarefas/get_timer.php', {id_tarefa: tarefa_id}, function (resp) {

                $('button').text(resp.running ? 'Pausar Contagem' : 'Iniciar Contagem');
                tempo = resp.seconds;
                timer();
                if (resp.running) {
                    interval = setInterval(timer, 1000);
                }
            });

            $('button').on('click', function () {
                var btn = this;
                btn.disabled = true;
                $.post('<?php echo HOME_URI; ?>/views/tarefas/grava_acao.php', {id_tarefa: tarefa_id}, function (resp) {
                    btn.disabled = false;
                    $(btn).text(resp.running ? 'Pausar Contagem' : 'Iniciar Contagem');
                    if (resp.running) {
                        timer();
                        interval = setInterval(timer, 1000);
                    } else {
                        clearInterval(interval);
                    }
                });
            });

        });
    </script>
</body>
</html>