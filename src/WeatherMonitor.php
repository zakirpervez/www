<?php

class WeatherMonitor
{
    /** @var TemperatureService */
    protected $service;

    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    /**
     * Get average temperature between two times.
     *
     *@param string $start
     *@param string $end
     *
     *@return float average temperature between start and end times.
     */
    public function getAverageTemperature(string $start, string $end): float {
        $startTemp = $this->service->getTemperature($start);
        $endTemp = $this->service->getTemperature($end);
        return ($startTemp+$endTemp)/2;
    }
}