<?php

namespace spec\Black\Component\Group\Domain\Model;

use Black\Component\Group\Domain\Model\GroupId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GroupIdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Component\Group\Domain\Model\GroupId');
        $this->shouldImplement('Black\DDD\DDDinPHP\Domain\Model\ValueObject');
    }

    function let()
    {
        $this->beConstructedWith("1234");
    }

    function it_should_have_a_value()
    {
        $this->getValue()->shouldBeEqualTo("1234");
    }

    function it_should_have_a_toString()
    {
        $this->__toString()->shouldBeEqualTo("1234");
    }

    function it_should_be_equal()
    {
        $object = new GroupId(1234);
        $this->isEqualTo($object)->shouldReturn(true);
    }

    function it_should_not_be_equal()
    {
        $object = new GroupId(12);
        $this->isEqualTo($object)->shouldReturn(false);
    }
}
