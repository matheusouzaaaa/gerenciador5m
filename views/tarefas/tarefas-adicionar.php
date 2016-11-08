<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Adicionar Tarefa | Gerenciador de Tarefas</title>
        <?php require_once 'views/_include/head.php'; ?>
        <?php require_once MODELS . '/Login/Login.class.php'; ?>
    </head>

    <body>
        <div id="wrap">
            <?php require INCLUSAO . '/nav.php'; ?>

            <div class="container-fluid">

                <?php require INCLUSAO . '/menu.php'; ?>

                <!-- Main window -->
                <div class="main_container" id="forms_page">
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
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" onsubmit="return validaAddPaginas(this);">
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
                                                <input class="span12" type="text" placeholder="Escreva o título da tarefa" name="titulo"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Descrição</label>
                                            <div class="controls">
                                                <textarea class="span12 ckeditor" rows="5" style="height:100px;" name="descricao"></textarea>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Comentários</label>
                                            <div class="controls">
                                                <textarea class="span12 ckeditor" rows="5" style="height:100px;" name="comentarios"></textarea>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Responsável</label>
                                            <div class="controls">
                                                <select name="tb_usuarios_id" tabindex="1" data-placeholder="Selecione..." class="span12">
                                                    <option value="">Selecione...</option>
                                                    <?php foreach ($view2 as $param): ?>
                                                        <option value="<?php echo $param['id']; ?>"><?php echo $param['nome']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Tipo de Tarefa</label>
                                            <div class="controls">
                                                <select name="tb_tarefas_tipo_id" tabindex="2" data-placeholder="Selecione..." class="span12">
                                                    <option value=""> Selecione...</option>
                                                    <?php foreach ($view3 as $param): ?>
                                                        <option value="<?php echo $param['id']; ?>"><?php echo $param['tipo']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Projetos</label>
                                            <div class="controls">
                                                <select name="tb_projetos_id" tabindex="3" data-placeholder="Selecione..." class="span12">
                                                    <option value="">Selecione...</option>
                                                    <?php foreach ($view4 as $param): ?>
                                                        <option value="<?php echo $param['id']; ?>"><?php echo $param['nome']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
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
    </body>

</html>