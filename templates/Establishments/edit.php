<div class="row">
    <div class="col d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card mb-3" style="width: 85%;">
            <div class="row g-0">
                <div class="col">
                    <div class="card-body">
                        <?= $this->Form->create() ?>
                        <div class="row mb-1">
                            <div class="col-sm">
                                <h5 class="text-center">Editar Estabelecimento</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm">
                                <input class="form-control" id="razaoSocial" name="razaoSocial" type="text"
                                       placeholder="Razão Social">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm">
                                <input class="form-control" id="cnpj" name="cnpj" maxlength="14" type="text"
                                       placeholder="CNPJ">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-11">
                                <div class="form-outline">
                                    <input class="form-control" onblur="liberaZap()"
                                           onkeydown="return mascaraTelefone(event)" maxlength="15" id="telefone"
                                           name="telefone" type="text" placeholder="Telefone">
                                </div>
                            </div>
                            <div hidden id="enviarMsgDiv" class="col-sm">
                                <a id="enviarMsg" target="_blank" href=""><i class="fa-brands fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <input type="text" id="cep" name="cep" placeholder="CEP" class="form-control"
                                       autocomplete="off" maxlength="10" onblur="pesquisacep(this);"
                                       data-mask="00.000-000"/>
                            </div>
                            <div class="col-sm">
                                <input type="text" id="logradouro" name="logradouro" class="form-control"
                                       placeholder="Rua/Avenida" autocomplete="off"/>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" id="numero" name="numero" placeholder="Número" class="form-control"
                                       autocomplete="off"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm">
                                <input type="text" id="complemento" name="complemento" class="form-control"
                                       placeholder="Complemento" autocomplete="off"/>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro"
                                       autocomplete="off"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm">
                                <input type="text" id="cidade" name="cidade" class="form-control" autocomplete="off"
                                       placeholder="Cidade"/>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" id="estado" name="estado" class="form-control" autocomplete="off"
                                       placeholder="Estado"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm">
                                <button type="submit" class="btn btn-outline-primary">Enviar</button>
                            </div>
                            <div class="col-sm d-flex justify-content-end">
                                <a class="btn btn-outline-danger" href="/employees/index">Cancelar</a>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(window).on("load", preencheCampos);

    function preencheCampos() {
        $('#razaoSocial').val("<?= $establishment['razaoSocial'] ?>");
        $('#cnpj').val("<?= $establishment['cnpj'] ?>");
        $('#telefone').val("<?= $establishment['telefone'] ?>");
        $('#email').val("<?= $establishment['email'] ?>");
        $('#logradouro').val("<?= $establishment['logradouro'] ?>");
        $('#numero').val("<?= $establishment['numero'] ?>");
        $('#complemento').val("<?= $establishment['complemento'] ?>");
        $('#referencia').val("<?= $establishment['referencia'] ?>");
        $('#bairro').val("<?= $establishment['bairro'] ?>");
        $('#cidade').val("<?= $establishment['cidade'] ?>");
        $('#estado').val("<?= $establishment['estado'] ?>");
        $('#cep').val("<?= $establishment['cep'] ?>");
        liberaZap();
        $('#cep').focus();
        $('#razaoSocial').focus();
        setTimeout(focoIncial, 1*500);
    }
    function focoIncial() {
        $('#razaoSocial').focus();
    }
</script>


<script type="text/javascript">
    /* Máscaras ER */
    function liberaZap() {
        $("#enviarMsgDiv").removeAttr('hidden');
        $("#enviarMsg").attr('href', "https://api.whatsapp.com/send?phone=55" + $("#telefone").val().replace(/[^0-9]/g, ''))
        ;

    }

    function mascaraTelefone(event) {
        let tecla = event.key;
        let telefone = event.target.value.replace(/\D+/g, "");

        if (/^[0-9]$/i.test(tecla)) {
            telefone = telefone + tecla;
            let tamanho = telefone.length;

            if (tamanho >= 12) {
                return false;
            }

            if (tamanho > 10) {
                telefone = telefone.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
            } else if (tamanho > 5) {
                telefone = telefone.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
            } else if (tamanho > 2) {
                telefone = telefone.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
            } else {
                telefone = telefone.replace(/^(\d*)/, "($1");
            }

            event.target.value = telefone;
        }

        if (!["Backspace", "Delete"].includes(tecla)) {
            return false;
        }
    }

    function mascaraData(campo, e) {
        var kC = (document.all) ? event.keyCode : e.keyCode;
        var data = campo.value;

        if (kC != 8 && kC != 46) {
            if (data.length == 2) {
                campo.value = data += '/';
            } else if (data.length == 5) {
                campo.value = data += '/';
            } else
                campo.value = data;
        }
    }

    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('logradouro').value = ("");
        document.getElementById('numero').value = ("");
        document.getElementById('complemento').value = ("");
        document.getElementById('bairro').value = ("");
        document.getElementById('cidade').value = ("");
        document.getElementById('estado').value = ("");
        document.getElementById('logradouro').readOnly = false;
        document.getElementById('bairro').readOnly = false;
        document.getElementById('cidade').readOnly = false;
        document.getElementById('estado').readOnly = false;
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value = (conteudo.logradouro);
            document.getElementById('numero').value = ("");
            document.getElementById('complemento').value = ("");
            document.getElementById('bairro').value = (conteudo.bairro);
            document.getElementById('cidade').value = (conteudo.localidade);
            document.getElementById('estado').value = (conteudo.uf);
            if (conteudo.bairro != '') {
                document.getElementById('bairro').focus();
                document.getElementById('bairro').readOnly = true;
            }
            if (conteudo.localidade != '') {
                document.getElementById('cidade').focus();
                document.getElementById('cidade').readOnly = true;
            }
            if (conteudo.uf != '') {
                document.getElementById('estado').focus();
                document.getElementById('estado').readOnly = true;
            }
            if (conteudo.logradouro != '') {
                document.getElementById('logradouro').focus();
                document.getElementById('logradouro').readOnly = true;
                document.getElementById('numero').focus();
            } else {
                document.getElementById('logradouro').focus();
            }
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
            document.getElementById('cep').value = '';
            document.getElementById('cep').focus();
        }
    }

    function pesquisacep(valor) {
        valor = valor.value;
        limpa_formulário_cep();
        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/[^0-9]/g, '');
        console.log(cep);
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            console.log(validacep);
            //Valida o formato do CEP.
            if (validacep.test(cep)) {
                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('logradouro').value = "...";
                document.getElementById('numero').value = "...";
                document.getElementById('complemento').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('estado').value = "...";
                //Cria um elemento javascript.
                var script = document.createElement('script');
                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
                document.getElementById('cep').value = '';
                document.getElementById('cep').focus();
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

</script>
