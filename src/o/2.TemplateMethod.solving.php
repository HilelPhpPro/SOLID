<?php

namespace TM2;


/**
 * Class StatisticAnalyser -- this abstract parent
 */
abstract class StatisticAnalyser
{
    public function __construct(protected array $data)
    {
    }

    /**
     * @return float|int
     */
    protected abstract function useCustomLogic(): float|int;

    /**
     * @return float|int
     */
    public function analyse()
    {
        return $this->useCustomLogic();
    }
}

class AnalyserSum extends StatisticAnalyser
{
    /**
     * @inheritdoc
     */
    protected function useCustomLogic(): float|int
    {
        return array_sum($this->data);
    }
}

class AnalyserAverage extends StatisticAnalyser
{
    /**
     * @inheritdoc
     */
    protected function useCustomLogic(): float|int
    {
        return array_sum($this->data) / count($this->data);
    }
}

class AnalyserMax extends StatisticAnalyser
{
    /**
     * @inheritdoc
     */
    protected function useCustomLogic(): float|int
    {
        return max($this->data);
    }
}

class AnalyserMin extends StatisticAnalyser
{
    /**
     * @inheritdoc
     */
    protected function useCustomLogic(): float|int
    {
        return min($this->data);
    }
}
class AnalyserFirst extends StatisticAnalyser
{
    /**
     * @inheritdoc
     */
    protected function useCustomLogic(): float|int
    {
        return current($this->data);
    }
}


$initialData = [
    3, 2, 1, 4, 5, 6, 2, 1, 4, 5
];

$analyser = new AnalyserSum($initialData);
echo "Total: " . $analyser->analyse() . PHP_EOL;

$analyser = new AnalyserAverage($initialData);
echo "Average: " . $analyser->analyse() . PHP_EOL;

$analyser = new AnalyserMax($initialData);
echo "Max: " . $analyser->analyse() . PHP_EOL;

$analyser = new AnalyserMin($initialData);
echo "Min: " . $analyser->analyse() . PHP_EOL;

$analyser = new AnalyserFirst($initialData);
echo "First: " . $analyser->analyse() . PHP_EOL;


