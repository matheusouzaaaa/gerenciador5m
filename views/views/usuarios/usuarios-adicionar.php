<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Adicionar Usuário | Gerenciador de Tarefas</title>
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
                            <li class="active"><p>Adicionar Usuário</p></li>
                        </ul>
                    </div>
                    <div class="row-fluid">
                        <div class="widget widget-padding span12">
                            <div class="widget-header">
                                <i class="icon-plus"></i><h5>Adicionar Usuário</h5>
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
                                            <label class="control-label">Nome Completo</label>
                                            <div class="controls">
                                                <input class="span12" type="text" placeholder="Escreva o nome do usuário" name="nome"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Categoria</label>
                                            <div class="controls">
                                                <select name="permissao" tabindex="3" data-placeholder="Selecione..." class="span12">
                                                    <option value="">Selecione...</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">E-mail</label>
                                            <div class="controls">
                                                <input class="span12" type="text" placeholder="Escreva o e-mail do usuário" name="email"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Password</label>
                                            <div class="controls">
                                                <input class="span12" type="password" placeholder="Escreva a senha do usuário" name="password"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Cargo</label>
                                            <div class="controls">
                                                <input class="span12" type="text" placeholder="Escreva o cargo do usuário" name="cargo"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Telefone</label>
                                            <div class="controls">
                                                <input class="span12" type="text" placeholder="Escreva o telefone do usuário" name="telefone"/>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label">Equipes</label>
                                            <div class="controls">
                                                <select name="tb_equipes_id" tabindex="1" data-placeholder="Selecione..." class="span12">
                                                    <option value="">Selecione...</option>
                                                    <?php foreach ($view as $param): ?>
                                                        <option value="<?php echo $param['id']; ?>"><?php echo $param['nome']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>


                                        <input type="submit" name="submit" class="btn btn-primary" value="Adicionar Usuário"/>
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