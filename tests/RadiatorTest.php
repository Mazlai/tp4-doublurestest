<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use iut\Radiator;
use iut\Thermometer;
use iut\iThermometer;

use \Mockery\Adapter\Phpunit\MockeryTestCase;

require __DIR__ . '/../vendor/autoload.php';

class RadiatorTest extends MockeryTestCase
{   

    public function testUpdateThermostat()
    {

        $mockThermometer = \Mockery::mock('Thermometer', 'iThermometer');

        $radiator = new Radiator($mockThermometer);

        $mockThermometer->shouldReceive('outsideTemperature')->andReturn(5);

        $radiator->updateThermostatFromOutsideTemperature();

        $this->assertSame(3, $radiator->thermostat);
    }

}
