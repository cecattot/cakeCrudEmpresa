<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Employee> $employee
 */
?>
<div class="row">
    <div class="col d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card mb-3" style="width: 85%;">
            <div class="row g-0">
                <div class="col">
                    <div class="card-body">
                        <?= $this->Form->create() ?>
                        <div class="row mb-1">
                            <div class="col-sm">
                                <h5 class="text-center">Adicionar Servidor</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm">
                                <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome">
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
                                <a id="enviarMsg" target="_blank"
                                   href="">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-11">
                                <input class="form-control" id="dataDeNascimento" name="dataDeNascimento" type="text"
                                       onblur="calculaData(this)" onkeypress="mascaraData( this, event )"
                                       placeholder="Data de Nascimento" maxlength="10">
                            </div>
                            <div class="col-sm">
                                <p id="idade"></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm">
                                <?php echo $this->Form->control('Estabelecimento', ['options' => $establishments, 'id' => 'establishment-id', 'name' => 'establishment_id', 'class' => 'form-select']); ?>
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

    function calculaData(data) {
        dateString = data.value
        niver = new Date(dateString);
        idade = Math.floor((Date.now() - niver) / (31557600000));
        console.log(idade);
        document.getElementById("idade").innerHTML = idade;
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
</script>
