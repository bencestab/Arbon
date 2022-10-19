<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Sponsor;
use Authorization\IdentityInterface;

/**
 * Sponsor policy
 */
class SponsorPolicy
{
    /**
     * Check if $user can add Sponsor
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Sponsor $sponsor
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Sponsor $sponsor)
    {
        return true;
    }

    /**
     * Check if $user can edit Sponsor
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Sponsor $sponsor
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Sponsor $sponsor)
    {
        return $this->isAuthor($user, $sponsor);
    }

    /**
     * Check if $user can delete Sponsor
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Sponsor $sponsor
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Sponsor $sponsor)
    {
        return $this->isAuthor($user, $sponsor);
    }

    /**
     * Check if $user can view Sponsor
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Sponsor $sponsor
     * @return bool
     */
    public function canView(IdentityInterface $user, Sponsor $sponsor)
    {
    }

    protected function isAuthor(IdentityInterface $user, Product $sponsor)
    {
        return $sponsor->user_id === $user->getIdentifier();
    }
}
