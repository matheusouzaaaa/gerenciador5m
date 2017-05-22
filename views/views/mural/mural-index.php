<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Mural | Gerenciador de Tarefas</title>
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
                        <li class="active"><p>Mural</p></li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="widget widget-padding span12">
                        <div class="widget-header">
                            <i class="icon-info-sign"></i>
                            <h5>Mural</h5>
                        </div>

                        <div class="widget-body row-fluid">
                            <div class="widget-forms clearfix">
                                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" onsubmit="return validaAddPaginas(this);">
                                    <div class="control-group">
                                        <label class="control-label">Comentário</label>
                                        <div class="controls">
                                            <textarea class="span12 ckeditor" rows="5" style="height:100px;" name="comentario"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="data_cadastro" value="<?php echo date("Y-m-d"); ?>"/> 
                                    <input type="submit" name="comentario-mural" class="btn btn-primary" value="Publicar"/>
                                </form>
                            </div>
                        </div><!--/widget-body-->

                        <?php foreach ($view as $param): ?>
                            <div class="widget-body row-fluid">
                                <p><strong>Nome:</strong> <?php echo $param['nome_comentario'] ?></p>
                                <p><strong>Comentário:</strong> <?php echo $param['comentario'] ?></p>
                                <p><strong>Data de Publicação:</strong> <?php echo dataBR($param['data_cadastro']); ?></p>
                            </div>
                        <?php endforeach; ?>



                    </div> <!-- /widget -->
                </div>
            </div><!--/main_container-->

        </div><!--/.fluid-container-->
    </div><!-- wrap ends-->

    <?php require INCLUSAO . '/footer.php'; ?>
    
</body>
</html>