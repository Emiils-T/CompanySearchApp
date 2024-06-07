<?php

namespace App;

class Result
{
    private ?string $name;
    private string $type;
    private string $registered;
    private string $address;
    private ?string $terminated;

    public function __construct(?string $name, string $type, string $registered, string $address, ?string $terminated)
    {
        $this->name = $name;
        $this->type = $type;
        $this->registered = $registered;
        $this->address = $address;
        $this->terminated = $terminated;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getRegistered(): string
    {
        return $this->registered;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getTerminated(): ?string
    {
        return $this->terminated;
    }

}
