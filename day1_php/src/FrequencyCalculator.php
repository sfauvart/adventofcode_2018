<?php
namespace App;

class FrequencyCalculator
{
    private $frequencies;
    private $results;
    private $occurrences;
    private $firstFrequencyReachedTwice;

    public function __construct()
    {
        $this->frequencies = array();
        $this->results = array();
        $this->occurrences = array(1);
        $this->firstFrequencyReachedTwice = null;
    }

    /**
     * @return integer
     */
    public function getFrequency()
    {
        if (count($this->results) == 0 ) {
            return 0;
        } else {
            return $this->results[count($this->results) - 1];
        }
    }

    /**
     * @param mixed $frequency
     */
    public function setFrequency($frequency)
    {
        $this->results[] = $frequency;
    }

    /**
     * @param mixed $frequency
     */
    public function addFrequency($frequency)
    {
        $this->frequencies[] = $frequency;

        $result = null;
        if (count($this->results) == 0 ) {
            $result = 0 + $frequency;
        } else {
            $result = $this->results[count($this->results)-1] + $frequency;
        }
        $this->results[] = $result;

        $occurrence = 1;
        for ($i=count($this->results)-2; $i>=0; $i--) {
            if ($this->results[$i] == $result) {
                $occurrence = $this->occurrences[$i] + 1;
                if (null === $this->firstFrequencyReachedTwice) {
                    $this->firstFrequencyReachedTwice = $i;
                    print_r('first key: ' . $i);
                }
            }
        }
        $this->occurrences[] = $occurrence;
    }

    /**
     * @return array
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @return integer
     */
    public function getFirstFrequencyReachedTwice() {
        $ok = false;
        $result = null;

        $frequenciesToRepeat = count($this->frequencies);

        $nbIter = 0;
        while ($this->firstFrequencyReachedTwice === null) {
            for ($i=0; $i<$frequenciesToRepeat; $i++) {
                $this->addFrequency($this->frequencies[$i]);
            }
//            foreach ($this->occurrences as $key => $occurrence) {
//                if ($occurrence > 1) {
//                    $result = $this->results[$key];
//                    $ok = true;
//                    break; // break foreach
//                }
//            }
            $nbIter++;
            print_r(sprintf('iteration : %s ', $nbIter));
        }

        print_r($this->results);
        return $this->results[$this->firstFrequencyReachedTwice];
    }
}