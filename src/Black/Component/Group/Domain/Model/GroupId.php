<?php

namespace Black\Component\Group\Domain\Model;

use Black\DDD\DDDinPHP\Domain\Model\ValueObject;

class GroupId implements ValueObject
{
    /**
     * @var
     */
    protected $value;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = (string) $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s', $this->getValue());
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param GroupId $userId
     *
     * @return bool
     */
    public function isEqualTo(GroupId $userId)
    {
        return $this->getValue() === $userId->getValue();
    }
}
