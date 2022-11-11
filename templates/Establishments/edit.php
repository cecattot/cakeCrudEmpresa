<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Establishment $establishment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $establishment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $establishment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Establishments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="establishments form content">
            <?= $this->Form->create($establishment) ?>
            <fieldset>
                <legend><?= __('Edit Establishment') ?></legend>
                <?php
                    echo $this->Form->control('razaoSocial');
                    echo $this->Form->control('cnpj');
                    echo $this->Form->control('telefone');
                    echo $this->Form->control('email');
                    echo $this->Form->control('endereco');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
