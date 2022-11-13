<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\employee> $employee
 */
?>
<div class="employees index content">
    <div class="card border border-success shadow-0 mb-3">
        <div class="card-header bg-transparent border-success">
            <div class="row">
                <div class="col">
                    <h3 class="text-center"><?= __('Funcionário') ?></h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" id="tableIndex">
                            <thead>
                            <tr>
                                <th width="25%">Campo</th>
                                <th>Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Nome</td>
                                <td><?= h($employee->nome) ?></td>
                            </tr>
                            <tr>
                                <td>Telefone</td>
                                <td><?= h($employee->telefone) ?></td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td><?= h($employee->email) ?></td>
                            </tr>
                            <tr>
                                <td>Data de Nascimento</td>
                                <td><?= h($employee->dataDeNascimento) ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
