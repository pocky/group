<?php

namespace Black\Component\Group\Domain\Model;

use Black\DDD\DDDinPHP\Domain\Model\Entity;
use Doctrine\Common\Collections\ArrayCollection;

class Group implements Entity
{
    protected $groupId;

    protected $name;

    protected $members;

    public function __construct(GroupId $groupId, $name)
    {
        $this->groupId = $groupId;
        $this->name    = $name;
        $this->members = new ArrayCollection();
    }

    public function getGroupId()
    {
        return $this->groupId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getMembers()
    {
        return $this->members;
    }

    public function addMember($member)
    {
        if (!$this->members->contains($member)) {
            $this->members->add($member);
        }

        return $this;
    }

    public function addMembers($members)
    {
        foreach ($members as $member) {
            $this->addMember($member);
        }

        return $this;
    }

    public function removeMember($member)
    {
        if ($this->members->contains($member)) {
            $this->members->removeElement($member);
        }

        return $this;
    }
}
