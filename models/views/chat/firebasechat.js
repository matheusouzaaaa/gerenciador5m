$(document).ready(function () {
    //instanciando o database do firebase.
    var APP = new Firebase('https://sistemas-distribuidos-6f88d.firebaseIO.com/');

    //faz os dados dos inputs nomeusuario e mensagem irem(push) pro database do firebase quando o usuário apertar enter.
    $('#mensagem').keypress(function (e) {
        if (e.keyCode == 13) {

            var msg = $('#mensagem').val();
            var usr = $('#nomeusuario').val();
            APP.push({nomeusuario: usr, mensagem: msg});

            $('#mensagem').val('');
        }
    });

    //faz os dados dos inputs nomeusuario e mensagem irem(push) pro database do firebase quando o usuário apertar o botão enviar
    $('#enviar').click(function (e) {
        var msg = $('#mensagem').val();
        var usr = $('#nomeusuario').val();
        APP.push({nomeusuario: usr, mensagem: msg});

        $('#mensagem').val('');
    });

    //função .on que juntamente do "child_added" e do callback "snap" faz as mensagens serem carregadas em tempo real na parte das mensagens.
    APP.on('child_added', function (snap) {
        var novamensagem = snap.val(); //Nova mensagem recebida.
        carregaMensagem(novamensagem.nomeusuario, novamensagem.mensagem);
    });
    
    
    //função que monta as mensagens vindas do firebase dentro de div
    function carregaMensagem(nome, mensagem) {
        $("<div class='div-mensagens'/>").text(mensagem)
                .prepend($('<strong/>').text(nome + ': '))
                .appendTo($('#mensagens'));

        $('#mensagens')[0].scrollTop = $('#mensagens')[0].scrollHeight;
    }
    ;
});