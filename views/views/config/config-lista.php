<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Configurações | Painel Administrativo Agência Web Falcon5M</title>
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
                                <i class="fa fa-edit"></i>Configurações do Web Site
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="" method="post" enctype="multipart/form-data">

                                <?php if (isset($mensagem)): ?>
                                    <div class="note note-success">
                                        <h4 class="block">
                                            <?php echo $mensagem ?>
                                        </h4>
                                    </div>
                                <?php endif; ?>

                                <?php foreach ($view as $param): ?>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                                <input type="text" name="email" class="form-control" value="<?php echo $param['email']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                                <input type="text" name="telefone" class="form-control" value="<?php echo $param['telefone']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CEP - <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank">Pesquise o cep</a></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-star"></i>
                                                </span>
                                                <input type="text" name="cep" class="form-control cep" id="cep" value="<?php echo $param['cep']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-star"></i>
                                                </span>
                                                <input type="text" name="estado" class="form-control" id="uf" value="<?php echo $param['estado']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cidade</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-star"></i>
                                                </span>
                                                <input type="text" name="cidade" class="form-control" id="cidade" value="<?php echo $param['cidade']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bairro</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-star"></i>
                                                </span>
                                                <input type="text" name="bairro" class="form-control" id="bairro" value="<?php echo $param['bairro']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-star"></i>
                                                </span>
                                                <input type="text" name="endereco" class="form-control" id="endereco" value="<?php echo $param['endereco']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Número</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-star"></i>
                                                </span>
                                                <input type="text" name="numero" class="form-control" value="<?php echo $param['numero']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-facebook"></i>
                                                </span>
                                                <input type="text" name="facebook" class="form-control" value="<?php echo $param['facebook']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-twitter"></i>
                                                </span>
                                                <input type="text" name="twitter" class="form-control" value="<?php echo $param['twitter']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-instagram"></i>
                                                </span>
                                                <input type="text" name="instagram" class="form-control" value="<?php echo $param['instagram']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Google Plus</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-google-plus"></i>
                                                </span>
                                                <input type="text" name="google" class="form-control" value="<?php echo $param['google']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="submit">
                                        <input type="submit" name="submit" value="Atualizar" class="btn blue" /> 
                                    </div>
                                    <div class="clear"></div>

                                <?php endforeach; ?>

                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>


                </div>
            </div>
            <?php require INCLUSAO . '/footer.php'; ?>
            <!-- END FOOTER -->


            <!-- JAVASCRIPTS -->
            <script>
// Registra o evento blur do campo "cep", ou seja, quando o usuário sair do campo "cep" faremos a consulta dos dados
                $("#cep").blur(function () {
// Para fazer a consulta, removemos tudo o que não é número do valor informado pelo usuário
                    var cep = this.value.replace(/[^0-9]/, "");
// Validação do CEP; caso o CEP não possua 8 números, então cancela a consulta
                    if (cep.length != 8) {
                        return false;
                    }

// Utilizamos o webservice "viacep.com.br" para buscar as informações do CEP fornecido pelo usuário.
// A url consiste no endereço do webservice ("http://viacep.com.br/ws/"), mais o cep que o usuário
// informou e também o tipo de retorno que desejamos, podendo ser "xml", "piped", "querty" ou o que
// iremos utilizar, que é "json"
                    var url = "http://viacep.com.br/ws/" + cep + "/json/";

// Aqui fazemos uma requisição ajax ao webservice, tratando o retorno com try/catch para que caso ocorra algum
// erro (o cep pode não existir, por exemplo) o usuário não seja afetado, assim ele pode continuar preenchendo os campos
                    $.getJSON(url, function (dadosRetorno) {
                        try {
// Insere os dados em cada campo
                            $("#endereco").val(dadosRetorno.logradouro);
                            $("#bairro").val(dadosRetorno.bairro);
                            $("#cidade").val(dadosRetorno.localidade);
                            $("#uf").val(dadosRetorno.uf);
                        } catch (ex) {
                        }
                    });
                });
            </script>
            <!-- END JAVASCRIPTS -->
    </body>
</html>