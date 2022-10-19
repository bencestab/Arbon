<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponsor $sponsor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sponsor'), ['action' => 'edit', $sponsor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sponsor'), ['action' => 'delete', $sponsor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sponsors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sponsor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sponsors view content">
            <h3><?= h($sponsor->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $sponsor->has('user') ? $this->Html->link($sponsor->user->name, ['controller' => 'Users', 'action' => 'view', $sponsor->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($sponsor->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($sponsor->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($sponsor->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Logo') ?></th>
                    <td><?= h($sponsor->logo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($sponsor->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zip') ?></th>
                    <td><?= h($sponsor->zip) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($sponsor->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country Id') ?></th>
                    <td><?= h($sponsor->country_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($sponsor->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sponsor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($sponsor->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($sponsor->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Categories') ?></h4>
                <?php if (!empty($sponsor->categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Price Per Season') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sponsor->categories as $categories) : ?>
                        <tr>
                            <td><?= h($categories->id) ?></td>
                            <td><?= h($categories->type) ?></td>
                            <td><?= h($categories->name) ?></td>
                            <td><?= h($categories->description) ?></td>
                            <td><?= h($categories->price_per_season) ?></td>
                            <td><?= h($categories->modified) ?></td>
                            <td><?= h($categories->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $categories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $categories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $categories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categories->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Products') ?></h4>
                <?php if (!empty($sponsor->products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <!-- <th><?= __('Id') ?></th> -->
                            <!-- <th><?= __('Sponsor Id') ?></th> -->
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <!-- <th><?= __('Image') ?></th> -->
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sponsor->products as $products) : ?>
                        <tr>
                            <!-- <td><?= h($products->id) ?></td> -->
                            <!-- <td><?= h($products->sponsor_id) ?></td> -->
                            <td><?= h($products->name) ?></td>
                            <td><?= h($products->description) ?></td>
                            <!-- <td><?= h($products->image) ?></td> -->
                            <td><?= h($products->modified) ?></td>
                            <td><?= h($products->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
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
