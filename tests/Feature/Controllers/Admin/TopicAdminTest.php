<?php

namespace Tests\Feature\Controller\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\TopicsAdmin;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Illuminate\Http\Request;
use App\Models\Topic;
use Mockery;

class TopicAdminTest extends TestCase
{
    /**
     * @var \Mockery\Mock|\Illuminate\Database\Connection
     */
    protected $db;

    /**
     * @var \Mockery\Mock|App\Models\Topic;
     */
    protected $topicMock;

    public function setUp()
    {
        $this->afterApplicationCreated(function () {
            $this->db = Mockery::mock(
                Connection::class.'[select,update,insert,delete]',
                [Mockery::mock(\PDO::class)]
            );
            $manager = $this->app['db'];
            $manager->setDefaultConnection('mock');
            $reflection = new \ReflectionClass($manager);
            $propety = $reflection->getProperty('connections');
            $propety->setAccessible(true);
            $list = $propety->getValue($manager);
            $list['mock'] = $this->db;
            $propety->setValue($manager, $list);
            $this->topicMock = Mockery::mock(Topic::class . '[update, delete]');
        });
        parent::setUp();
    }

    public function testIndexReturnView()
    {
        $controller = new TopicsAdmin();
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "topic"',
            [],
            Mockery::any(),
        ])->andReturn((object) ['aggregate' => 10]);
        $view = $controller->index();
        $this->assertEquals('admin.topic.index', $view->getName());
        $this->assertArrayHasKey('topics', $view->getData());
    }
}
