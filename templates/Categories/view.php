<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories view content">
            <h3><?= h($category->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($category->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price Per Season') ?></th>
                    <td><?= $category->price_per_season === null ? '' : $this->Number->format($category->price_per_season) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($category->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($category->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($category->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Products') ?></h4>
                <?php if (!empty($category->products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sponsor Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->products as $products) : ?>
                        <tr>
                            <td><?= h($products->id) ?></td>
                            <td><?= h($products->sponsor_id) ?></td>
                            <td><?= h($products->name) ?></td>
                            <td><?= h($products->description) ?></td>
                            <td><?= h($products->image) ?></td>
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
            <div class="related">
                <h4><?= __('Related Sponsors') ?></h4>
                <?php if (!empty($category->sponsors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Logo') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('Zip') ?></th>
                            <th><?= __('City') ?></th>
                            <th><?= __('Country Id') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->sponsors as $sponsors) : ?>
                        <tr>
                            <td><?= h($sponsors->id) ?></td>
                            <td><?= h($sponsors->user_id) ?></td>
                            <td><?= h($sponsors->name) ?></td>
                            <td><?= h($sponsors->slug) ?></td>
                            <td><?= h($sponsors->email) ?></td>
                            <td><?= h($sponsors->logo) ?></td>
                            <td><?= h($sponsors->address) ?></td>
                            <td><?= h($sponsors->zip) ?></td>
                            <td><?= h($sponsors->city) ?></td>
                            <td><?= h($sponsors->country_id) ?></td>
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
