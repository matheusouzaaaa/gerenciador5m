<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Relatório do Usuário | Gerenciador de Tarefas</title>
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
                                                <select name="tb_tarefas_tipo_id" class="form-control agenda" style="width: 100%; margin: 10px 0px;">
                                                    <option value="" selected=""> Selecione...</option>
                                                    <?php foreach ($view3 as $param): ?>
                                                        <option value="<?php echo $param['id']; ?>"><?php echo $param['tipo']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <input type="submit" name="submit-tipo-tarefa" value="Filtrar" class="btn btn-default margin-filtro" style="width: 100%; background: #292a2f; color: #fff; border: none;" />
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
</body>
</html>