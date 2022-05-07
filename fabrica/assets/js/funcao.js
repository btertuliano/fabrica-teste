$(document).ready(function () {

    function dataAtualFormatada() {
        var data = new Date(),
            dia = data.getDate().toString(),
            diaF = (dia.length == 1) ? '0' + dia : dia,
            mes = (data.getMonth() + 1).toString(), //+1 pois no getMonth Janeiro começa com zero.
            mesF = (mes.length == 1) ? '0' + mes : mes,
            anoF = data.getFullYear();
        return diaF + "/" + mesF + "/" + anoF;
    }

    $('#editarCliente').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var nome = button.data('nome')
        var telefone = button.data('telefone')
        var email = button.data('email')
        var nascimento = button.data('nascimento')
        var cep = button.data('cep')
        var logradouro = button.data('logradouro')
        var numero = button.data('numero')
        var bairro = button.data('bairro')
        var cidade = button.data('cidade')
        var uf = button.data('uf')
        var complemento = button.data('complemento')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID ' + id)
        modal.find('#id').val(id)
        modal.find('#nome').val(nome)
        modal.find('#telefone').val(telefone)
        modal.find('#email').val(email)
        modal.find('#nascimento').val(dataAtualFormatada(nascimento))
        modal.find('#cep').val(cep)
        modal.find('#logradouro').val(logradouro)
        modal.find('#numero').val(numero)
        modal.find('#bairro').val(bairro)
        modal.find('#cidade').val(cidade)
        modal.find('#uf').val(uf)
        modal.find('#complemento').val(complemento)

    });

    $('#formCliente').submit(function () {
        var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
        var email = $('#email').val();

        if (email == '' || !er.test(email)) { alert('Preencha o campo email corretamente'); return false; }
    });

    $('#telefone').mask('(00) 00000-0000');
    $("#dataNascimento").mask("99/99/9999");
    $("#cep").mask("99999-999");

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#cep").val("");
        $("#logradouro").val("");
        $("#numero").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function () {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#logradouro").val("...");
                $("#numero").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#logradouro").val(dados.logradouro);
                        $("#numero").val("");
                        $("#numero").focus();
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                        $("#cep").focus();
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
                $("#cep").focus();
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
            $("#cep").focus();
        }
    });

});