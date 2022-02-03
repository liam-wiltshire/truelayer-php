<?php

declare(strict_types=1);

namespace TrueLayer\Interfaces\SchemeIdentifier;

interface BbanInterface extends BbanDetailsInterface
{
    /**
     * @param string $bban
     *
     * @return BbanInterface
     */
    public function bban(string $bban): BbanInterface;
}