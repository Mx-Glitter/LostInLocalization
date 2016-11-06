<?php

namespace AppBundle\Entity;

class Person
{
    /**
     * @var Group[]
     */
    private $groups;

    /**
     * @var string
     */
    private $firstName;

    public function __construct()
    {
        $this->groups = [];
    }

    /**
     * @param Group $group
     *
     * @return $this
     */
    public function joinGroup(Group $group)
    {
        $this->groups[$group->getName()] = $group;

        return $this;
    }

    /**
     * @param Group $group
     *
     * @return $this
     */
    public function leaveGroup(Group $group)
    {
        unset($this->groups[$group->getName()]);

        return $this;
    }

    /**
     * @return Group[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     *
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }
}
