<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sponsor> $sponsors
 */
?>
<div class="sponsors index content">
    <?= $this->Html->link(__('New Sponsor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sponsors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <!-- <th><?= $this->Paginator->sort('logo') ?></th> -->
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('zip') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <!-- <th><?= $this->Paginator->sort('country_id') ?></th> -->
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sponsors as $sponsor): ?>
                <tr>
                    <!-- <td><?= $this->Number->format($sponsor->id) ?></td> -->
                    <td><?= $sponsor->has('user') ? $this->Html->link($sponsor->user->name, ['controller' => 'Users', 'action' => 'view', $sponsor->user->id]) : '' ?></td>
                    <td><?= h($sponsor->name) ?></td>
                    <td><?= h($sponsor->slug) ?></td>
                    <td><?= h($sponsor->email) ?></td>
                    <!-- <td><?= h($sponsor->logo) ?></td> -->
                    <td><?= h($sponsor->address) ?></td>
                    <td><?= h($sponsor->zip) ?></td>
                    <td><?= h($sponsor->city) ?></td>
                    <!-- <td><?= h($sponsor->country_id) ?></td> -->
                    <td><?= h($sponsor->phone) ?></td>
                    <td><?= h($sponsor->modified) ?></td>
                    <td><?= h($sponsor->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sponsor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sponsor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sponsor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsor->id)]) ?>
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
