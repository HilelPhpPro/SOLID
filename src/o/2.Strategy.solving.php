<?php

namespace Strategy2;


interface IAnalyser
{
    /**
     * @param array $data
     * @return float|int
     */
    public function analyse(array $data): int|float;

}

/**
 * Class StatisticAnalyser -- this is CONTEXT for strategy
 */
class StatisticAnalyser implements IAnalyser
{
    public function __construct(protected IAnalyser $analyser)
    {
    }

    /**
     * @param IAnalyser $analyser
     */
    public function changeStrategy(IAnalyser $analyser): void
    {
        $this->analyser = $analyser;
    }

    /**
     * @param array $data
     * @return float|int
     */
    public function analyse(array $data): int|float
    {
        return $this->analyser->analyse($data);
    }
}

class AnalyserSum implements IAnalyser
{
    /**
     * @inheritdoc
     */
    public function analyse(array $data): int|float
    {
        return array_sum($data);
    }
}

class AnalyserAverage implements IAnalyser
{
    /**
     * @inheritdoc
     */
    public function analyse(array $data): int|float
    {
        return array_sum($data) / count($data);
    }
}

class AnalyserMax implements IAnalyser
{
    /**
     * @inheritdoc
     */
    public function analyse(array $data): int|float
    {
        return max($data);
    }
}
class AnalyserMin implements IAnalyser
{
    /**
     * @inheritdoc
     */
    public function analyse(array $data): int|float
    {
        return min($data);
    }
}
class AnalyserFirst implements IAnalyser
{
    /**
     * @inheritdoc
     */
    public function analyse(array $data): int|float
    {
        return current($data);
    }
}
class AnalyserLast implements IAnalyser
{
    /**
     * @inheritdoc
     */
    public function analyse(array $data): int|float
    {
        return $data[count($data)-1];
    }
}




function admin(StatisticAnalyser $analyser){
    $initialData = [
        3, 2, 1, 4, 5, 6, 2, 1, 4, 5
    ];
    echo $analyser->analyse($initialData) . PHP_EOL;

}



$analyser = new StatisticAnalyser(new AnalyserSum());
admin($analyser);

$analyser->changeStrategy(new AnalyserAverage());
admin($analyser);

