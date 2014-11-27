<?php

namespace spec\Black\Component\Group\Domain\Model;

use Black\Component\Group\Domain\Model\GroupId;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GroupSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Component\Group\Domain\Model\Group');
        $this->shouldBeAnInstanceOf('Black\DDD\DDDinPHP\Domain\Model\Entity');
    }

    function let()
    {
        $groupId = new GroupId(1);
        $this->beConstructedWith($groupId, 'test');
    }


    function it_should_have_a_groupId()
    {
        $this->getGroupId()->shouldBeAnInstanceOf('Black\Component\Group\Domain\Model\GroupId');
        $this->getGroupId()->getValue()->shouldReturn("1");
    }

    function it_should_have_a_name()
    {
        $this->getName()->shouldReturn('test');
    }

    function it_should_add_member()
    {
        $member = ['test'];

        $this->addMember($member)->shouldReturn($this);
        $this->getMembers()->count()->shouldReturn(1);
    }

    function it_should_add_members()
    {
        $members = ['member1', 'member2', 'member3'];

        $this->addMembers($members)->shouldReturn($this);
        $this->getMembers()->count()->shouldReturn(3);
    }

    function it_should_remove_member()
    {
        $members = ['member1', 'member2', 'member3'];

        $this->addMembers($members)->shouldReturn($this);

        $this->removeMember('member2')->shouldReturn($this);
        $this->getMembers()->count()->shouldReturn(2);
    }
}
