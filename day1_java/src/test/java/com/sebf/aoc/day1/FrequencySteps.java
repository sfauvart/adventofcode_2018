package com.sebf.aoc.day1;

import cucumber.api.java.en.Given;
import cucumber.api.java.en.Then;
import cucumber.api.java.en.When;
import org.junit.Assert;

public class FrequencySteps {
    private FrequencyCalculator frequencyCalc = new FrequencyCalculator();

    @Given("^Current frequency is \\+?(-?\\d+)$")
    public void current_frequency_is(int arg1) throws Throwable {
        frequencyCalc.setFrequency(arg1);
    }

    @Given("^I add frequency change \\+?(-?\\d+)$")
    public void i_add_frequency_change(int arg1) throws Throwable {
        frequencyCalc.addFrequency(arg1);
    }

    @When("^I tell the current frequency$")
    public Long i_tell_the_current_frequency() throws Throwable {
        return frequencyCalc.getFrequency();
    }

    @Then("^I should have a resulting frequency of \\+?(-?\\d+)$")
    public void i_should_have_a_resulting_frequency_of(int arg1) throws Throwable {
        Assert.assertEquals(Long.valueOf(arg1), i_tell_the_current_frequency());
    }

    @When("^I repeat the same list of frequency change$")
    public void i_repeat_the_same_list_of_frequency_change() throws Throwable {
        assert true;
    }

    @Then("^I should have first frequency reached twice is \\+?(-?\\d+)$")
    public void i_should_have_first_frequency_reached_twice_is(int arg1) throws Throwable {
        Assert.assertEquals(Long.valueOf(arg1), frequencyCalc.getFirstFrequencyReachedTwice());
    }
}
