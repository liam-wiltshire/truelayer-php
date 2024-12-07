<?php

declare(strict_types=1);

namespace TrueLayer\Entities\Payment;

use TrueLayer\Constants\PaymentStatus;
use TrueLayer\Entities\Entity;
use TrueLayer\Interfaces\Payment\PaymentRetrievedInterface;
use TrueLayer\Interfaces\PaymentMethod\PaymentMethodInterface;

class PaymentRetrieved extends Entity implements PaymentRetrievedInterface
{
    /**
     * @var string
     */
    protected string $id;

    /**
     * @var int
     */
    protected int $amountInMinor;

    /**
     * @var string
     */
    protected string $currency;

    /**
     * @var array<string, string>
     */
    protected array $metadata;

    /**
     * @var string
     */
    protected string $status;

    /**
     * @var PaymentMethodInterface
     */
    protected PaymentMethodInterface $paymentMethod;

    /**
     * @var string
     */
    protected string $userId;

    /**
     * @var \DateTimeInterface
     */
    protected \DateTimeInterface $createdAt;

    /**
     * @var \DateTimeInterface|null
     */
    protected ?\DateTimeInterface $creditableAt;

    /**
     * @var class-string[]
     */
    protected array $casts = [
        'payment_method' => PaymentMethodInterface::class,
        'created_at' => \DateTimeInterface::class,
        'creditable_at' => \DateTimeInterface::class,
    ];

    /**
     * @return string[]
     */
    protected array $arrayFields = [
        'id',
        'status',
        'created_at',
        'amount_in_minor',
        'currency',
        'metadata',
        'user.id' => 'user_id',
        'payment_method',
        'creditable_at',
    ];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getAmountInMinor(): int
    {
        return $this->amountInMinor;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return array<string, string>
     */
    public function getMetadata(): array
    {
        return $this->metadata ?? [];
    }

    /**
     * @return PaymentMethodInterface
     */
    public function getPaymentMethod(): PaymentMethodInterface
    {
        return $this->paymentMethod;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getCreditableAt(): ?\DateTimeInterface
    {
        return $this->creditableAt ?? null;
    }    

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function isAuthorizationRequired(): bool
    {
        return $this->getStatus() === PaymentStatus::AUTHORIZATION_REQUIRED;
    }

    /**
     * @return bool
     */
    public function isAuthorizing(): bool
    {
        return $this->getStatus() === PaymentStatus::AUTHORIZING;
    }

    /**
     * @return bool
     */
    public function isAuthorized(): bool
    {
        return $this->getStatus() === PaymentStatus::AUTHORIZED;
    }

    /**
     * @return bool
     */
    public function isExecuted(): bool
    {
        return $this->getStatus() === PaymentStatus::EXECUTED;
    }

    /**
     * @return bool
     */
    public function isFailed(): bool
    {
        return $this->getStatus() === PaymentStatus::FAILED;
    }

    /**
     * @return bool
     */
    public function isAttemptFailed(): bool
    {
        return $this->getStatus() === PaymentStatus::ATTEMPT_FAILED;
    }

    /**
     * @return bool
     */
    public function isSettled(): bool
    {
        return $this->getStatus() === PaymentStatus::SETTLED;
    }
}
