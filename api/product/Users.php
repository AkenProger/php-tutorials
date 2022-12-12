<?php
class Users
{

    private string $name;
    private bool $isActive;

    /**
     * @param string $name
     * @param bool $isActive
     */
    public function __construct(string $name, bool $isActive)
    {

        $this->name = $name;
        $this->isActive = $isActive;
    }



    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }




}
