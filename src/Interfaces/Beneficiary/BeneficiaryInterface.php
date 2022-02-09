<?php

declare(strict_types=1);

namespace TrueLayer\Interfaces\Beneficiary;

use TrueLayer\Interfaces\ArrayableInterface;
use TrueLayer\Interfaces\HasAttributesInterface;

interface BeneficiaryInterface extends ArrayableInterface, HasAttributesInterface
{
    /**
     * @return string|null
     */
    public function getAccountHolderName(): ?string;

    /**
     * @param string $name
     *
     * @return $this
     */
    public function accountHolderName(string $name): self;

    /**
     * @return string
     */
    public function getType(): string;
}
