<?php

declare(strict_types=1);

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2019 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Jose\Bundle\JoseFramework\Tests\Functional\KeyManagement;

use Jose\Component\KeyManagement\JKUFactory;
use Jose\Component\KeyManagement\X5UFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group Bundle
 * @group functional
 * @group KeyManagement
 *
 * @internal
 */
class JKUAndX5UFactoriesTest extends WebTestCase
{
    protected function setUp(): void
    {
        if (!class_exists(JKUFactory::class)) {
            static::markTestSkipped('The component "web-token/jwt-key-mgmt" is not installed.');
        }
    }

    /**
     * @test
     */
    public function theJKUFactoryServiceIsAvailable()
    {
        $client = static::createClient();

        $container = $client->getContainer();
        static::assertTrue($container->has(JKUFactory::class));
    }

    /**
     * @test
     */
    public function theX5UFactoryServiceIsAvailable()
    {
        $client = static::createClient();

        $container = $client->getContainer();
        static::assertTrue($container->has(X5UFactory::class));
    }
}
