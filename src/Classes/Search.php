<?php

namespace App\Classes;

class Search
{
    private string $value;

    /**
     * @return mixed
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }


}
