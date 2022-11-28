<?php

namespace Kayrah87\NameParser\Part;

class Initial extends GivenNamePart
{
    /**
     * uppercase the initial
     *
     * @return string
     */
    public function normalize(): string
    {
        return strtoupper($this->getValue());
    }
}
