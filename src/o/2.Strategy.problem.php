<?php

namespace Strategy0;

class StatisticAnalyser
{
    /**
     * @param array $data
     * @return float|int
     */
    public function analyse(array $data): float|int
    {
        return array_sum($data);
    }


}

// =======================

function admin(StatisticAnalyser $analyser){
    $initialData = [
        3, 2, 1, 4, 5, 6, 2, 1, 4, 5
    ];
    echo $analyser->analyse($initialData) . PHP_EOL;
}

$analyser = new StatisticAnalyser();

admin($analyser);














namespace Strategy1;


class NewStatisticAnalyser extends StatisticAnalyser
{
    const TYPE_SUM = 0;
    const TYPE_AVERAGE = 1;
    const TYPE_MAX = 2;
    const TYPE_MIN = 3;
    const TYPE_FIRST = 4;
    protected int $flag = self::TYPE_SUM;
    public function setFlag(int $type = self::TYPE_SUM)
    {
        $this->flag = $type;
    }
    /**
     * @param array $data
     * @return float|int
     * @throws \Exception
     */
    public function analyse(array $data): mixed
    {
        if ($this->flag == self::TYPE_SUM) {
            $result = array_sum($data);
        } elseif ($this->flag == self::TYPE_AVERAGE) {
            $result = array_sum($data) / count($data);
        } elseif ($this->flag == self::TYPE_MAX) {
            $result = max($data);
        } elseif ($this->flag == self::TYPE_MIN) {
            $result = min($data);
        } elseif ($this->flag == self::TYPE_FIRST) {
            $result = current($data);
        } else {
            throw new \Exception('Undefined type statistic');
        }
        return $result;
    }
}




function admin(StatisticAnalyser $analyser){
    $initialData = [
        3, 2, 1, 4, 5, 6, 2, 1, 4, 5
    ];
    echo $analyser->analyse($initialData) . PHP_EOL;
}
$analyser = new NewStatisticAnalyser();
admin($analyser);

$analyser->setFlag(NewStatisticAnalyser::TYPE_AVERAGE);
admin($analyser);
