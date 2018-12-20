<?php
namespace App;

class FrequencyCalculator
{
    private $frequency;

    public function __construct()
    {
        $this->frequency = 0;
    }

    /**
     * @return mixed
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param mixed $frequency
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
    }

    /**
     * @param mixed $frequency
     */
    public function addFrequency($frequency)
    {
        $this->frequency = $this->frequency + $frequency;
    }

}