<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Sponsors') ?></h4>
                <?php if (!empty($user->sponsors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <!-- <th><?= __('Id') ?></th> -->
                            <!-- <th><?= __('User Id') ?></th> -->
                            <th><?= __('Name') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Email') ?></th>
                            <!-- <th><?= __('Logo') ?></th> -->
                            <th><?= __('Address') ?></th>
                            <th><?= __('Zip') ?></th>
                            <th><?= __('City') ?></th>
                            <!-- <th><?= __('Country Id') ?></th> -->
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->sponsors as $sponsors) : ?>
                        <tr>
                            <!-- <td><?= h($sponsors->id) ?></td> -->
                            <!-- <td><?= h($sponsors->user_id) ?></td> -->
                            <td><?= h($sponsors->name) ?></td>
                            <td><?= h($sponsors->slug) ?></td>
                            <td><?= h($sponsors->email) ?></td>
                            <!-- <td><?= h($sponsors->logo) ?></td> -->
                            <td><?= h($sponsors->address) ?></td>
                            <td><?= h($sponsors->zip) ?></td>
                            <td><?= h($sponsors->city) ?></td>
                            <!-- <td><?= h($sponsors->country_id) ?></td> -->
                            <td><?= h($sponsors->phone) ?></td>
                            <td><?= h($sponsors->modified) ?></td>
                            <td><?= h($sponsors->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Sponsors', 'action' => 'view', $sponsors->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Sponsors', 'action' => 'edit', $sponsors->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sponsors', 'action' => 'delete', $sponsors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsors->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
