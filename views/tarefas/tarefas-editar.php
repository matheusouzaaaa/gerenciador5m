<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Editar Página | Painel Administrativo Agência Web Falcon5M</title>
        <?php require INCLUSAO . '/head.php'; ?>
    </head>

    <body class="page-header-fixed page-sidebar-fixed">
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">
                <!-- BEGIN LOGO -->
                <?php require INCLUSAO . '/logo.php'; ?>
                <!-- END LOGO -->
                <?php require INCLUSAO . '/nav.php'; ?>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
                    <?php require INCLUSAO . '/menu.php'; ?>
                </div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">

                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i>Editar Página
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validaAddPaginas(this);">

                                <?php if (isset($mensagem)): ?>
                                    <div class="note note-success">
                                        <h4 class="block">
                                            <?php echo $mensagem; ?>
                                        </h4>
                                    </div>
                                <?php endif; ?>

                                <?php foreach ( $view as $param): ?>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Título:
                                        <span class="required">
                                            *
                                        </span>
                                    </label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="titulo" placeholder="" value="<?php echo $param['titulo']; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Texto:
                                        <span class="required">
                                            *
                                        </span>
                                    </label>
                                    <div class="col-md-10">
                                        <textarea name="texto" class="ckeditor form-control"><?php echo $param['texto']; ?></textarea>
                                    </div>
                                </div>
                                
                                 <?php endforeach; ?>

                                <div class="submit">
                                    <input type="submit" name="submit" value="Editar" class="btn blue" /> 
                                </div>
                                <div class="clear"></div>

                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>


                </div>
            </div>
            <?php require INCLUSAO . '/footer.php'; ?>
            <!-- END FOOTER -->

            <!-- END JAVASCRIPTS -->
    </body>
</html>