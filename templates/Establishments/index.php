<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\establishment> $establishments
 */
?>
<div class="establishments index content">
    <div class="card border border-success shadow-0 mb-3">
        <div class="card-header bg-transparent border-success">
            <div class="row">
                <div class="col-10">
                    <h3 class="text-center"><?= __('Estabelecimentos') ?></h3>
                </div>
                <div class="col">
                    <?= $this->Html->link(__('Novo estabelecimento'), ['controller' => 'establishments', 'action' => 'add'], ['class' => 'btn btn-success']) ?>
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
                                <th width="15%">Razão Social</th>
                                <th>CNPJ</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Logradouro</th>
                                <th>Número</th>
                                <th>Complemento</th>
                                <th>Referência</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>CEP</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($establishments as $establishment): ?>
                                <tr>
                                    <td><?= h($establishment->razaoSocial) ?></td>
                                    <td><?= h($establishment->cnpj) ?></td>
                                    <td><?= h($establishment->telefone) ?></td>
                                    <td><?= h($establishment->email) ?></td>
                                    <td><?= h($establishment->logradouro) ?></td>
                                    <td><?= h($establishment->numero) ?></td>
                                    <td><?= h($establishment->complemento) ?></td>
                                    <td><?= h($establishment->referencia) ?></td>
                                    <td><?= h($establishment->bairro) ?></td>
                                    <td><?= h($establishment->cidade) ?></td>
                                    <td><?= h($establishment->estado) ?></td>
                                    <td><?= h($establishment->cep) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="/establishments/view/<?= $establishment->id ?>" type="button" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                            <a href="/establishments/edit/<?= $establishment->id ?>" type="button" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                                            <?php if ($establishment->ativo == 'S'): ?>
                                                <a href="/establishments/desativar/<?= $establishment->id ?>" type="button" class="btn btn-danger"><i
                                                        class="fa-solid fa-x"></i></a>
                                            <?php else: ?>
                                                <a href="/establishments/desativar/<?= $establishment->id ?>" type="button" class="btn btn-success"><i
                                                        class="fa-solid fa-check"></i></a>
                                            <?php endif; ?>
                                        </div>

                                        <!--                                         $this->Html->link("Ver", ['action' => 'view', $establishment->id], ['class' => 'btn  btn-outline-primary']) ?>-->
                                        <!--                                        $this->Html->link("Editar", ['action' => 'edit', $establishment->id], ['class' => 'btn  btn-outline-warning']) ?>-->
                                        <!--                                         $this->Form->postLink($establishment->ativo == 'S' ? "Desativar" : "Ativo", ['controller' => 'establishments', 'action' => 'desativar', $establishment->id], ['class' => 'btn  btn-outline-danger']) ?>-->
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
</div>
