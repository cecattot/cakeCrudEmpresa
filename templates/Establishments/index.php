<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Establishment> $establishments
 */
?>
<div class="establishments index content">
    <?= $this->Html->link(__('New Establishment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Establishments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('razaoSocial') ?></th>
                    <th><?= $this->Paginator->sort('cnpj') ?></th>
                    <th><?= $this->Paginator->sort('telefone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('endereco') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($establishments as $establishment): ?>
                <tr>
                    <td><?= $this->Number->format($establishment->id) ?></td>
                    <td><?= h($establishment->razaoSocial) ?></td>
                    <td><?= $this->Number->format($establishment->cnpj) ?></td>
                    <td><?= h($establishment->telefone) ?></td>
                    <td><?= h($establishment->email) ?></td>
                    <td><?= h($establishment->endereco) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $establishment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $establishment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $establishment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $establishment->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
