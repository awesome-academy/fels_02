<?php

namespace Tests\Feature\Views\Home\Topic;

use Tests\TestCase;
use App\Models\Topic;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopicTest extends TestCase
{
    private $topic;

    public function setup()
    {
        parent::setup();
        $this->topic = factory(Topic::class)->create();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanVisitTopicPageAndViewAllTopic()
    {
        $response = $this->get('/topic');

        $response->assertNotFound();

        $response->assertSee('Topic');

        $response->assertSee($this->topic->topic_name);
    }

    public function testUserCanVisitASingleTopicPage()
    {
        $response = $this->get('/lesson/' . $this->topic->topic_id);

        $response->assertSee($this->topic->topic_name);

        $response->assertOk();
    }
}
