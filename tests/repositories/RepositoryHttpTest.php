<?php

namespace Tests\Http;

use Tests\TestCase;
use App\Repositories\RepositoryHttp;
use Mockery;

class RepositoryHttpTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testGet()
    {
        $data = [
            'response' => [
                'articles' => [
                    [
                        'excerpt' => 'Lorem',
                        'title' => 'Ipsum',
                        'images' => [
                            'thumbnail' => [
                                'image' => 'http://google.com/image.jpg'
                            ]
                        ]
                    ],
                    [
                        'excerpt' => 'Lorem',
                        'title' => 'Ipsum',
                        'images' => [
                            'thumbnail' => [
                                'image' => 'http://google.com/image.jpg'
                            ]
                        ]
                    ]
                ]
            ]
        ];
        $service = Mockery::mock('App\Http\ClientInterface');
        $service->shouldReceive('get')->andReturn($data);
        $class = new RepositoryHttp($service);
        $response = $class->get('resource');
        $this->assertEquals(count($response), 2);
    }
}
