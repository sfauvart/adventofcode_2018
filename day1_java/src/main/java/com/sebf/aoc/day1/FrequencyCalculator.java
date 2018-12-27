package com.sebf.aoc.day1;

import java.util.ArrayList;

public class FrequencyCalculator {
    private ArrayList<Long> frequencies;
    private ArrayList<Long> results;
    private ArrayList<Long> occurrences;
    private Integer firstFrequencyReachedTwice;

    public FrequencyCalculator() {
        frequencies = new ArrayList<Long>();
        results = new ArrayList<Long>();
        occurrences = new ArrayList<Long>();
        occurrences.add(1L);
        firstFrequencyReachedTwice = null;
    }

    public Long getFrequency() {
        if (results.size() == 0) {
            return 0L;
        } else {
            return results.get(results.size() - 1);
        }
    }

    public void setFrequency(long frequency) {
        results.add(frequency);
    }

    public void addFrequency(long frequency) {
        frequencies.add(frequency);

        Long result;
        if (results.size() == 0) {
            result = frequency;
        } else {
            result = results.get(results.size() - 1) + frequency;
        }
        results.add(result);

        long occurrence = 1;
        for (int i = results.size() - 2; i >= 0; i--) {
            if (result.equals(results.get(i))) {
                occurrence = occurrences.get(i) + 1;
                if (null == firstFrequencyReachedTwice) {
                    firstFrequencyReachedTwice = i;
                }
            }
        }
        occurrences.add(occurrence);
    }

    public ArrayList<Long> getResults() {
        return results;
    }

    public Long getFirstFrequencyReachedTwice() {
        boolean ok = false;
        Long result = null;

        int frequenciesToRepeat = frequencies.size();

        long nbIter = 0;
        while (firstFrequencyReachedTwice == null) {
            for (int i = 0; i < frequenciesToRepeat; i++) {
                addFrequency(frequencies.get(i));
            }
            nbIter++;
            System.out.println(String.format("iteration : %s ", nbIter));
        }

        return results.get(firstFrequencyReachedTwice);
    }
}
