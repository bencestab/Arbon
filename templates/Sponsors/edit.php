<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponsor $sponsor
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sponsor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sponsor->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sponsors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sponsors form content">
            <?= $this->Form->create($sponsor) ?>
            <fieldset>
                <legend><?= __('Edit Sponsor') ?></legend>
                <?php
                    echo $this->Form->control(['options' => $users]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('slug');
                    echo $this->Form->control('email');
                    echo $this->Form->control('logo');
                    echo $this->Form->control('address');
                    echo $this->Form->control('zip');
                    echo $this->Form->control('city');
                    echo $this->Form->control('country_id');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('categories._ids', ['options' => $categories]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
