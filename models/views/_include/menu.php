<?php require_once MODELS . '/Login/Login.class.php'; ?>
<!-- Side menu -->
<div class="sidebar-nav nav-collapse collapse">
    <div class="user_side clearfix">
        <a href="<?php echo HOME_URI; ?>/tarefas/index"><h5><?php $login = New Login(); $login->identifica(); ?></h5></a>
        <a href="<?php echo HOME_URI; ?>/usuarios/editar/<?php $login = New Login(); $login->identificaid(); ?>"><i class="icon-cog"></i> Configurações</a>        
    </div>
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle b_C3F7A7 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse1"><i class="icon-tasks"></i> <span>Tarefas</span></a>
            </div>
            <div id="collapse1" class="accordion-body collapse">
                <div class="accordion-inner">
                    <a class="accordion-toggle" href="<?php echo HOME_URI; ?>/tarefas/adicionar/"><i class="icon-star"></i> Adicionar Tarefa</a>
                    <a class="accordion-toggle" href="<?php echo HOME_URI; ?>/tarefas/lista/"><i class="icon-list-alt"></i> Lista de Tarefas</a>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle b_C1F8A9" href="<?php echo HOME_URI; ?>/tarefas/relatorios/"><i class="icon-bar-chart"></i> <span>Relatório</span></a>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle b_C1F8A9" href="<?php echo HOME_URI; ?>/clientes/lista/"><i class="icon-briefcase"></i> <span>Clientes</span></a>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle b_C1F8A9" href="<?php echo HOME_URI; ?>/projetos/lista/"><i class="icon-lightbulb"></i> <span>Projetos</span></a>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle b_C1F8A9" href="<?php echo HOME_URI; ?>/mural/index"><i class="icon-thumbs-up"></i> <span>Mural</span></a>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
            <a class="accordion-toggle b_C1F8A9" href="<?php echo HOME_URI; ?>/usuarios/chat"><i class="icon-comments"></i> <span>Chat</span></a>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle b_C3F7A7 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse2"><i class="icon-user"></i> <span>Administrar</span></a>
            </div>
            <div id="collapse2" class="accordion-body collapse">
                <div class="accordion-inner">
                    <a class="accordion-toggle" href="<?php echo HOME_URI; ?>/tarefas/tipo/"><i class="icon-plus"></i> Tipos de Tarefas</a>
                    <a class="accordion-toggle" href="<?php echo HOME_URI; ?>/usuarios/adicionar/"><i class="icon-star"></i> Adicionar Usuário</a>
                    <a class="accordion-toggle" href="<?php echo HOME_URI; ?>/usuarios/lista/"><i class="icon-list-alt"></i> Lista de Usuários</a>
                    <a class="accordion-toggle" href="<?php echo HOME_URI; ?>/tarefas/graficos/"><i class="icon-signal"></i> Gráficos</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Side menu -->