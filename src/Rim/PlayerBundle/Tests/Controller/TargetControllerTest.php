<?php

namespace Rim\PlayerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TargetControllerTest extends WebTestCase
{
    public function testProcess()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/process');
    }

}
