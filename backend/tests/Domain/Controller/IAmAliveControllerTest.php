<?php

namespace App\Tests\Domain\Controller;

use App\Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IAmAliveControllerTest
 * @package App\Tests\Domain\Controller
 * @coversDefaultClass \App\Domain\Controller\IAmAliveController
 */
class IAmAliveControllerTest extends TestCase
{
    /**
     * @test
     * @covers ::handle
     */
    public function itShouldReturnStatusCode200WhenMicroIsAlive()
    {
        $client = $this->createClient();
        $client->request('GET', '/api/i-am-alive');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
}
