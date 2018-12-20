<?php
if (is_file($autoload = getcwd() . '/vendor/autoload.php')) {
    require $autoload;
}

use App\FrequencyCalculator;

class Main
{
    private $frequencyCalc;

    public function __construct()
    {
        $this->frequencyCalc = new FrequencyCalculator();
    }

    public function run() {
        $handle = @fopen("data/my_aoc.csv", "r");
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                $this->frequencyCalc->addFrequency(intval($buffer));
            }
            if (!feof($handle)) {
                echo "Erreur: fgets() a échoué\n";
            }
            fclose($handle);
        }
        print_r($this->frequencyCalc->getFrequency());
    }
}

$app = new Main();
$app->run();