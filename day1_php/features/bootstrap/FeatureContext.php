<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;
use App\FrequencyCalculator;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $frequencyCalc;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->frequencyCalc = new FrequencyCalculator();
    }

    // Puzzle Part 1

    /**
     * @Given Current frequency is :arg1
     */
    public function currentFrequencyIs($arg1)
    {
        $this->frequencyCalc->setFrequency($arg1);
    }

    /**
     * @When I tell the current frequency
     */
    public function iTellTheCurrentFrequency()
    {
        return $this->frequencyCalc->getFrequency();
    }

    /**
     * @Then I should have a resulting frequency of :arg1
     */
    public function iShouldHaveAResultingFrequencyOf($arg1)
    {
        Assert::assertEquals($arg1, $this->iTellTheCurrentFrequency());
    }

    /**
     * @Given I add frequency change :arg1
     */
    public function iAddFrequencyChange($arg1)
    {
        $this->frequencyCalc->addFrequency($arg1);
    }

    // Puzzle Part 2
    /**
     * @When I repeat the same list of frequency change
     */
    public function iRepeatTheSameListOfFrequencyChange()
    {
        return true;
    }

    /**
     * @Then I should have first frequency reached twice is :arg1
     */
    public function iShouldHaveFirstFrequencyReachedTwiceIs($arg1)
    {
        Assert::assertEquals($arg1, $this->frequencyCalc->getFirstFrequencyReachedTwice());
    }

}
