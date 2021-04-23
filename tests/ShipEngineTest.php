<?php declare(strict_types=1);

namespace ShipEngine\Tests;

use PHPUnit\Framework\TestCase;
use ShipEngine\Model\Address\Address;
use ShipEngine\ShipEngine;

/**
 * @covers \ShipEngine\ShipEngine
 * @covers \ShipEngine\ShipEngineClient
 */
final class ShipEngineTest extends TestCase
{
    private static ShipEngine $shipengine;

    private static Address $good_address;

    public static function setUpBeforeClass(): void
    {
        self::$shipengine = new ShipEngine(
            array(
                'api_key' => 'baz',
                'base_url' => 'https://api.shipengine.com',
                'page_size' => 75,
                'retries' => 7,
                'timeout' => new \DateInterval('PT15000S'),
                'events' => null
            )
        );
        self::$good_address = new Address(
            array(
                'street' => array('4 Jersey St', 'ste 200'),
                'city_locality' => 'Boston',
                'state_province' => 'MA',
                'postal_code' => '02215',
                'country_code' => 'US',
            )
        );
    }

    public function testInstantiation(): void
    {
        $this->assertInstanceOf(ShipEngine::class, self::$shipengine);
    }
}
