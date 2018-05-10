<?php include "db.class.php";


class Multiplications
{

    public $startPoint;
    public $endPoint;
    public $iterations;
    public $numbers = [];


    /**
     * @return array
     */
    public function getNumbers()
    {
        return $this->numbers;
    }

    public function __construct($startPoint = 0, $endPoint = 1, $iterations = 1)
    {



        $this->startPoint = $startPoint;
        $this->endPoint = $endPoint;
        $this->iterations = $iterations;

        $this->numbers = (array_slice(range($this->startPoint + 1, $this->endPoint - 1), 0, $this->iterations ));



    }

    public function getFilteredNumbersByMultiplier($multiplier)
    {
        $multiplication = [];

        foreach ($this->numbers as $number => $value) {
            if ($value % $multiplier == 0) {
                $multiplication[] = $value;
            }
        }

        return $multiplication;
    }

    public function isInputValid()
    {
        if (!is_numeric($this->startPoint) || $this->startPoint < 0 || !is_numeric($this->endPoint) || ($this->endPoint) < 1 || !is_numeric($this->iterations) || $this->iterations < 1) {
            return false;
        }
        return true;
    }


    public function curl()
    {
        $ch = curl_init("http://php.net/manual/ro/function.array-slice.php");

        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_exec($ch);
        curl_close($ch);
    }
}
