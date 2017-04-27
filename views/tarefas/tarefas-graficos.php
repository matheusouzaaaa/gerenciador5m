<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Gráficos de Tarefas | Gerenciador de Tarefas</title>
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
                        <li class="active"><p>Gráficos de Tarefas</p></li>
                    </ul>
                </div>

                <div class="row-fluid">
                    <div class="widget span12">
                        <div class="widget-header">
                            <i class="icon-signal"></i>
                            <h5>Gráficos de Tarefas</h5>
                            <div class="widget-buttons">
                                <a href="javascript: history.go(-1)"><i class="icon-reply"></i> Voltar</a>
                            </div>
                        </div>
                        <canvas id="myChart" width="200" height="200"></canvas>
                    </div>
                </div>

            </div>
            <!-- /Main window -->

        </div><!--/.fluid-container-->
    </div><!-- wrap ends-->

    <?php require INCLUSAO . '/footer.php'; ?>

    <?php $numero = 200; ?>

    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                datasets: [{
                    label: 'Tarefas Entregues',
                    data: [7, 8, 10, 5, 3, 5, 4, 7, 2, 3, 8, 9],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Tarefas Pendentes',
                    data: [1, 3, 4, 2, 1, 7, 2, 4, 2, 1, 1, 0],
                    backgroundColor: [
                    'rgba(9, 153, 207, 0.2)'
                    ],
                    borderColor: [
                    'rgba(24,121,144,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>


</body>
</html>