<?php

namespace Tests\Feature\Fatories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Topic;

class TopicFactoryTest extends TestCase
{
    private $topic;

    public function setup()
    {
        parent::setup();
        $this->topic = factory(Topic::class)->make();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTopicHasName()
    {
        $this->assertNotEmpty($this->topic->topic_name);
    }

    public function testTopicHasPreview()
    {
        $this->assertNotEmpty($this->topic->preview);
    }

    public function testTopicHasPicture()
    {
        $this->assertNotEmpty($this->topic->picture);
    }
}
