<?php


namespace App\Traits;


/**
 * Trait Status
 * @package App\Traits
 */
trait Status
{
    /**
     * @var int
     */
    protected $isPublished          = 1;
    /**
     * @var int
     */
    protected $isAccepted           = 2;
    /**
     * @var int
     */
    protected $isPickedUp           = 3;
    /**
     * @var int
     */
    protected $isValid              = 4;
    /**
     * @var int
     */
    protected $isInvalid            = 5;
    /**
     * @var int
     */
    protected $isExceededUsingLimit = 6;
    /**
     * @var int
     */
    protected $isCanceled           = 7;
    /**
     * @var int
     */
    protected $isRejected           = 9;
    /**
     * @var int
     */
    protected $isDelivered          = 11;
    /**
     * @var int
     */
    protected $isVerified           = 12;
    /**
     * @var int
     */
    protected $isRunning            = 13;
    /**
     * @var int
     */
    protected $isActive             = 14;
    /**
     * @var int
     */
    protected $isExpired            = 15;
    /**
     * @var int
     */
    protected $isSeen               = 16;
    /**
     * @var int
     */
    protected $isSolved             = 17;
}
