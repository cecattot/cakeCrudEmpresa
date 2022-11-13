<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\establishment> $establishment
 */
?>
<div class="establishments index content">
    <div class="card border border-success shadow-0 mb-3">
        <div class="card-header bg-transparent border-success">
            <div class="row">
                <div class="col">
                    <h3 class="text-center"><?= __('Estabelecimentos') ?></h3>
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
                                <td>Razão Social</td>
                                <td><?= h($establishment->razaoSocial) ?></td>
                            </tr>
                            <tr>
                                <td>CNPJ</td>
                                <td><?= h($establishment->cnpj) ?></td>
                            </tr>
                            <tr>
                                <td>Telefone</td>
                                <td><?= h($establishment->telefone) ?></td>
                            </tr>
                            <tr>
                                <td>CEP</td>
                                <td><?= h($establishment->cep) ?></td>
                            </tr>
                            <tr>
                                <td>Logradouro</td>
                                <td><?= h($establishment->logradouro) ?></td>
                            </tr>
                            <tr>
                                <td>Número</td>
                                <td><?= h($establishment->numero) ?></td>
                            </tr>
                            <tr>
                                <td>Complemento</td>
                                <td><?= h($establishment->complemento) ?></td>
                            </tr>
                            <tr>
                                <td>Bairro</td>
                                <td><?= h($establishment->bairro) ?></td>
                            </tr>
                            <tr>
                                <td>Cidade</td>
                                <td><?= h($establishment->cidade) ?></td>
                            </tr>
                            <tr>
                                <td>Estado</td>
                                <td><?= h($establishment->estado) ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border border-success shadow-0 mb-3">
    <div class="card-header bg-transparent border-success">
        <div class="row">
            <div class="col-10">
                <h3 class="text-center"><?= __('Funcionários') ?></h3>
            </div>
            <div class="col">
                <?php $this->request->getSession()->write('Empresa', $establishment['id']) ?>
                <?= $this->Html->link(__('Novo Funcionário'), ['controller' => 'employees', 'action' => 'add'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-sm table-hover" id="tableIndex2">
                        <thead>
                        <tr>
                            <th width="25%">Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Data de Nascimento</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($establishment['employees'] as $employee): ?>
                            <tr>
                                <td><?= h($employee->nome) ?></td>
                                <td><?= h($employee->telefone) ?></td>
                                <td><?= h($employee->email) ?></td>
                                <td><?= h($employee->dataDeNascimento) ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="/employees/view/<?= $employee->id ?>" type="button"
                                           class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                        <a href="/employees/edit/<?= $employee->id ?>" type="button"
                                           class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                                        <?php if ($employee->ativo == 'S'): ?>
                                            <a href="/employees/desativar/<?= $employee->id ?>" type="button"
                                               class="btn btn-danger"><i
                                                    class="fa-solid fa-x"></i></a>
                                        <?php else: ?>
                                            <a href="/employees/desativar/<?= $employee->id ?>" type="button"
                                               class="btn btn-success"><i
                                                    class="fa-solid fa-check"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
