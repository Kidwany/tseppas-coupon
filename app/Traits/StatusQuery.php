<?php


namespace App\Traits;


/**
 * Trait Status
 * @package App\Traits
 */
trait StatusQuery
{
    use Status;
    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsPublished($query)
    {
        return $query->where('status_id', $this->isPublished);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsAccepted($query)
    {
        return $query->where('status_id', $this->isAccepted);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsPickedUp($query)
    {
        return $query->where('status_id', $this->isPickedUp);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsValid($query)
    {
        return $query->where('status_id', $this->isValid);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsExceededUsingLimit($query)
    {
        return $query->where('status_id', $this->isExceededUsingLimit);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsCanceled($query)
    {
        return $query->where('status_id', $this->isCanceled);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsRejected($query)
    {
        return $query->where('status_id', $this->isRejected);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsDelivered($query)
    {
        return $query->where('status_id', $this->isDelivered);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsVerified($query)
    {
        return $query->where('status_id', $this->isVerified);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsRunning($query)
    {
        return $query->where('status_id', $this->isRunning);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsActive($query)
    {
        return $query->where('status_id', $this->isActive);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsExpired($query)
    {
        return $query->where('status_id', $this->isExpired);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsSeen($query)
    {
        return $query->where('status_id', $this->isSeen);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsSolved($query)
    {
        return $query->where('status_id', $this->isSolved);
    }
}
