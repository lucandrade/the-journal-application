<?php

namespace Tests\Http;

use Tests\TestCase;
use App\Http\ClientGuzzle;
use Mockery;

class ClientGuzzleTest extends TestCase
{
    protected $class;

    public function setUp()
    {
        parent::setUp();
        $this->class = new ClientGuzzle();
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testConfiguration()
    {
        $config = $this->class->getConfiguration();
        $this->assertInternalType('array', $config);
        $this->assertArrayHasKey('url', $config);
        $this->assertArrayHasKey('uri', $config);
        $this->assertArrayHasKey('user', $config);
        $this->assertArrayHasKey('password', $config);
    }

    /**
     * @depends testConfiguration
     */
    public function testUrl()
    {
        $config = $this->class->getConfiguration();
        $uri = 'thejournal';
        $clientUri = $this->class->getUri($uri);
        $rightUri = "{$config['uri']}{$uri}";
        $this->assertEquals($clientUri, $rightUri);
    }
}
