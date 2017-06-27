$(document).ready(function () {

    //AUTO COMPLETE CLIENTE
    $("#nome").autocomplete("../../views/agenda/autocomplete.php", {
        width: 310,
        selectFirst: false
    });

    //AUTO COMPLETE BUSCA CLIENTE
    $("#busca-cliente").autocomplete("../views/clientes/busca-cliente.php", {
        width: 310,
        selectFirst: false
    });

    //AUTO COMPLETE BUSCA ESTADO
    $("#busca-estado").autocomplete("../views/clientes/busca-estado.php", {
        width: 310,
        selectFirst: false
    });

    //mask
    $(".telefone").mask("(99) 9999-9999");
    $(".cpf").mask("999.999.999-99");
    $(".cnpj").mask("99.999.999/9999-99");
    $(".horario").mask("99:99");
    $(".cep").mask("99999-999");

    $(".datepicker").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior',
        minDate: 0
    });

    $(".datepicker3").datepicker({
        numberOfMonths: 3,
        showButtonPanel: true,
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });

    //PRÉ VISUALIZAÇÃO DA IMAGEM
    $("#fileUpload").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#image-holder");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image",
                    "width": "300"
                }).appendTo(image_holder);
            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("Este navegador nao suporta FileReader.");
        }
    });

    $('#select-all').click(function (event) {
        if (this.checked) {
            $(':checkbox').prop('checked', true);
        } else {
            $(':checkbox').prop('checked', false);
        }
    });


    $(function () {
        $("#sortable").sortable({
            update: function () {
                var order = $('#sortable').sortable('serialize');
                $("#info").load("processo.php?usuarioId/" + order);
            }
        });
        $("#sortable").disableSelection();
    });

});


function validaLogin(form) {

    if (form.user.value == "") {
        alertify.alert("x Preencha o campo usuário");
        form.user.focus();
        return false;
    }
    if (form.password.value == "") {
        alertify.alert("x Preencha o campo senha");
        form.password.focus();
        return false;
    }
}

function validaRecover(form) {

    if (form.email.value == "") {
        alertify.alert("x Preencha o campo e-mail");
        form.email.focus();
        return false;
    }
}

function validaRedefinir(form) {

    if (form.password.value == "") {
        alertify.alert("x Preencha o campo com seu senha");
        form.password.focus();
        return false;
    }
    if (form.password2.value == "") {
        alertify.alert("x Preencha o campo com a confirmação da senha");
        form.password2.focus();
        return false;
    }
    if (form.password.value != form.password2.value) {
        alertify.alert("x Senhas não conferem, favor digitar novamente");
        form.password2.focus();
        return false;
    }
}

function validaAddCategorias(form) {

    if (form.nome.value == "") {
        alertify.alert("x Preencha o campo nome");
        form.nome.focus();
        return false;
    }
}

function validaAddPaginas(form) {

    if (form.titulo.value == "") {
        alertify.alert("x Preencha o campo título da página");
        form.titulo.focus();
        return false;
    }
}

function validaAddNoticias(form) {

    if (form.titulo.value == "") {
        alertify.alert("x Preencha o campo título");
        form.titulo.focus();
        return false;
    }
    if (form.data.value == "") {
        alertify.alert("x Preencha o campo data");
        form.data.focus();
        return false;
    }
    if (form.horario.value == "") {
        alertify.alert("x Preencha o campo horário");
        form.horario.focus();
        return false;
    }

}

function validaAddGeral(form) {

    if (form.categorias_id.value == "") {
        alertify.alert("x Selecione a categoria");
        form.categorias_id.focus();
        return false;
    }

    if (form.nome.value == "") {
        alertify.alert("x Preencha o campo nome");
        form.nome.focus();
        return false;
    }
}

function validaAddVideos(form) {

    if (form.tipo.value == "") {
        alertify.alert("x Selecione a categoria");
        form.tipo.focus();
        return false;
    }

    if (form.titulo.value == "") {
        alertify.alert("x Preencha o campo título");
        form.titulo.focus();
        return false;
    }
    if (form.url.value == "") {
        alertify.alert("x Preencha o campo id do vídeo");
        form.url.focus();
        return false;
    }
}

function validaAddArquivos(form) {

    if (form.nome.value == "") {
        alertify.alert("x Preencha o campo nome");
        form.nome.focus();
        return false;
    }
}

function validaAddClientes(form) {

    if (form.nome.value == "") {
        alertify.alert("x Preencha o campo nome");
        form.nome.focus();
        return false;
    }
    if (form.email.value == "") {
        alertify.alert("x Preencha o campo e-mail");
        form.email.focus();
        return false;
    }
}

function validaAddDepoimentos(form) {

    if (form.nome.value == "") {
        alertify.alert("x Preencha o campo nome");
        form.nome.focus();
        return false;
    }
    if (form.data.value == "") {
        alertify.alert("x Preencha o campo data");
        form.data.focus();
        return false;
    }
}

function validaAddEquipe(form) {

    if (form.tb_equipes_categoria_id.value == "") {
        alertify.alert("x Selecione a categoria");
        form.tb_equipes_categoria_id.focus();
        return false;
    }
    if (form.nome.value == "") {
        alertify.alert("x Preencha o campo nome");
        form.nome.focus();
        return false;
    }
    if (form.cargo.value == "") {
        alertify.alert("x Preencha o campo cargo");
        form.cargo.focus();
        return false;
    }
}

function validaAddGaleria(form) {

    if (form.categorias_id.value == "") {
        alertify.alert("x Selecione a categoria");
        form.categorias_id.focus();
        return false;
    }

    if (form.nome.value == "") {
        alertify.alert("x Preencha o campo nome");
        form.nome.focus();
        return false;
    }
}

function validaAddUsuarios(form) {

    if (form.permissao.value == "") {
        alertify.alert("x Selecione a permissão");
        form.permissao.focus();
        return false;
    }

    if (form.operador.value == "") {
        alertify.alert("x Selecione o operador de chat");
        form.operador.focus();
        return false;
    }

    if (form.nome.value == "") {
        alertify.alert("x Preencha o campo nome");
        form.nome.focus();
        return false;
    }
    if (form.user.value == "") {
        alertify.alert("x Preencha o campo usuário");
        form.user.focus();
        return false;
    }
    if (form.password.value == "") {
        alertify.alert("x Preencha o campo senha");
        form.password.focus();
        return false;
    }
    if (form.dica.value == "") {
        alertify.alert("x Preencha o campo dica de segurança");
        form.dica.focus();
        return false;
    }
}

function validaAddAgenda(form) {

    if (form.cliente.value == "") {
        alertify.alert("x Preencha o campo nome do cliente");
        form.cliente.focus();
        return false;
    }
    if (form.data.value == "") {
        alertify.alert("x Preencha o campo data");
        form.data.focus();
        return false;
    }
    if (form.horario.value == "") {
        alertify.alert("x Preencha o campo horário");
        form.horario.focus();
        return false;
    }
}

function validaAgendaData(form) {

    if (form.data.value == "") {
        alertify.alert("x Selecione a data do compromisso");
        form.data.focus();
        return false;
    }
}

function validaAgendaMes(form) {

    if (form.mes.value == "") {
        alertify.alert("x Selecione o mês");
        form.mes.focus();
        return false;
    }
}

function validaAgendaAno(form) {

    if (form.ano.value == "") {
        alertify.alert("x Selecione o ano");
        form.ano.focus();
        return false;
    }
}

function validaClienteNome(form) {

    if (form.nome.value == "") {
        alertify.alert("x Preencha o campo nome");
        form.nome.focus();
        return false;
    }
}

function validaClienteEmail(form) {

    if (form.email.value == "") {
        alertify.alert("x Preencha o campo e-mail");
        form.email.focus();
        return false;
    }
}

function validaClienteEstado(form) {

    if (form.estado.value == "") {
        alertify.alert("x Preencha o campo estado");
        form.estado.focus();
        return false;
    }
}

function validaNoticiaData(form) {

    if (form.data.value == "") {
        alertify.alert("x Preencha o campo data");
        form.data.focus();
        return false;
    }
}

function validaNoticiaTitulo(form) {

    if (form.titulo.value == "") {
        alertify.alert("x Preencha o campo título");
        form.titulo.focus();
        return false;
    }
}

function validaGeralNome(form) {

    if (form.nome.value == "") {
        alertify.alert("x Preencha o campo nome");
        form.nome.focus();
        return false;
    }
}

function validaGeralCategoria(form) {

    if (form.categorias_id.value == "") {
        alertify.alert("x Selecione a categoria");
        form.categorias_id.focus();
        return false;
    }
}

function validaCadastrarTarefa(this){
    
    if (form.titulo.value == "") {
        alertify.alert("x Preencha o campo titulo");
        form.titulo.focus();
        return false;
    }

    if (form.descricao.value == "") {
        alertify.alert("x Preencha o campo descricao");
        form.descricao.focus();
        return false;
    }

    if (form.tb_usuarios_id.value == "") {
        alertify.alert("x Selecione o responsável");
        form.tb_usuarios_id.focus();
        return false;
    }

    if (form.tb_tarefas_tipo_id.value == "") {
        alertify.alert("x Selecione o tipo de tarefa");
        form.tb_tarefas_tipo_id.focus();
        return false;
    }

    if (form.tb_projetos_id.value == "") {
        alertify.alert("x Selecione o projeto");
        form.tb_projetos_id.focus();
        return false;
    }

}