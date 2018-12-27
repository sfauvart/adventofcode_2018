import com.sebf.aoc.day1.FrequencyCalculator;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public class Run {

    public static void main(String[] args) {
        FrequencyCalculator frequencyCalc;

        frequencyCalc = new FrequencyCalculator();
        frequencyCalc.setFrequency(0);

        BufferedReader reader;
        try {
            reader = new BufferedReader(new FileReader(
                    "src/main/resources/my_aoc.csv"));
            String line = reader.readLine();
            while (line != null) {
                Integer freq = Integer.valueOf(line);
                frequencyCalc.addFrequency(freq);
//                System.out.println(freq);
                // read next line
                line = reader.readLine();
            }
            reader.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
        System.out.println(String.format("Part 1 : %s", frequencyCalc.getFrequency()));
        Long test = frequencyCalc.getFirstFrequencyReachedTwice();
        System.out.println(String.format("Part 2 : %s", test));
        System.out.println(test);
    }
}
