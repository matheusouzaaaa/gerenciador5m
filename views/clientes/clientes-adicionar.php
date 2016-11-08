<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Adicionar Cliente | Painel Administrativo Agência Web Falcon5M</title>
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
                                <i class="fa fa-plus-square-o"></i>Adicionar Cliente
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validaAddClientes(this);">

                                <?php if (isset($mensagem)): ?>
                                    <div class="note note-success">
                                        <h4 class="block">
                                            <?php echo $mensagem ?>
                                        </h4>
                                    </div>
                                <?php endif; ?>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="text" name="nome" class="form-control" /> </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="text" name="email" class="form-control" /> </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo de Pessoa</label>
                                        <select name="tipo_pessoa" class="form-control">
                                            <option value="" selected="">Selecione...</option>
                                            <option value="física">Física</option>
                                            <option value="jurídica">Jurídica</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Documento</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-bars"></i>
                                            </span>
                                            <input type="text" name="documento" class="form-control" /> </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input type="text" name="telefone" class="form-control" /> </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input type="text" name="celular" class="form-control" /> </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CEP - <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank">Pesquise o cep</a></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-star"></i>
                                            </span>
                                            <input type="text" name="cep" class="form-control cep" id="cep"/> </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Estado (Sigla, ex: RS)</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-star"></i>
                                            </span>
                                            <input type="text" name="estado" class="form-control" id="uf" maxlength="2"/> </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-star"></i>
                                            </span>
                                            <input type="text" name="cidade" class="form-control" id="cidade"/> </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-star"></i>
                                            </span>
                                            <input type="text" name="bairro" class="form-control" id="bairro"/> </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-star"></i>
                                            </span>
                                            <input type="text" name="endereco" class="form-control" id="endereco"/> </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-star"></i>
                                            </span>
                                            <input type="text" name="numero" class="form-control" /> </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Observação</label>
                                        <textarea name="obs" class="form-control" rows="8"></textarea>
                                    </div>
                                </div>
                                
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Arquivo</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-picture-o"></i>
                                            </span>
                                            <input type="file" class="form-control" name="anexo" accept="application/pdf,application/word"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="clear"></div>

                                <div class="submit">
                                    <input type="hidden" value="1" name="ativo" />
                                    <input type="submit" name="submit" value="Cadastrar" class="btn blue" /> 
                                    <input type="reset" value="Limpar Campos" class="btn blue" />      
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