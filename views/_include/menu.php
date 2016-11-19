<?php require_once MODELS . '/Login/Login.class.php'; ?>
<!-- Side menu -->
<div class="sidebar-nav nav-collapse collapse">
    <div class="user_side clearfix">
        <h5><?php $login = New Login(); $login->identifica(); ?></h5>
        <a href="#"><i class="icon-cog"></i> Configurações</a>        
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
                    <a class="accordion-toggle" href="<?php echo HOME_URI; ?>/tarefas/tipo/"><i class="icon-plus"></i> Tipos de Tarefas</a>
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
                <a class="accordion-toggle b_C3F7A7 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse2"><i class="icon-user"></i> <span>Usuários</span></a>
            </div>
            <div id="collapse2" class="accordion-body collapse">
                <div class="accordion-inner">
                    <a class="accordion-toggle" href="<?php echo HOME_URI; ?>/usuarios/adicionar/"><i class="icon-star"></i> Adicionar Usuário</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Side menu -->