<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Product;
use Authorization\IdentityInterface;

/**
 * Product policy
 */
class ProductPolicy
{
    /**
     * Check if $user can add Product
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Product $product
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Product $product)
    {
        return true;
    }

    /**
     * Check if $user can edit Product
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Product $product
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Product $product)
    {
        return $this->isAuthor($user, $product);

    }

    /**
     * Check if $user can delete Product
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Product $product
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Product $product)
    {
        return $this->isAuthor($user, $product);

    }

    /**
     * Check if $user can view Product
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Product $product
     * @return bool
     */
    public function canView(IdentityInterface $user, Product $product)
    {
    }

    protected function isAuthor(IdentityInterface $user, Product $product)
    {
        return $product->user_id === $user->getIdentifier();
    }
}
