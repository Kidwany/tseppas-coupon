<?php


namespace App\Traits;


/**
 * Trait Status
 * @package App\Traits
 */
trait OrderType
{
    /**
     * @var int
     */
    protected $isText               = 1;
    /**
     * @var int
     */
    protected $isVoice              = 2;
    /**
     * @var int
     */
    protected $isImage              = 3;
}
