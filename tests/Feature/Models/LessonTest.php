<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\Topic;
use App\Models\Lesson;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testContainsValidFillableProperties()
    {
        $model = new Lesson();

        $this->assertEquals(['lesson_name', 'topic_id'], $model->getFillable());
    }

    public function testTableName()
    {
        $model = new Lesson();

        $this->assertEquals('lesson', $model->getTable());
    }

    public function testPrimaryKey()
    {
        $model = new Lesson();

        $this->assertEquals('lesson_id', $model->getKeyName());
    }

    public function testLessonRelation()
    {
        $model = new Lesson();
        $relation = $model->topic();

        $this->assertInstanceOf(BelongsTo::class, $relation);

        $this->assertEquals('topic_topic_id', $relation->getForeignKey());

        $this->assertEquals('topic_id', $relation->getOwnerKey());
    }

    public function testLessonHasLessonNameAttribute()
    {
        $lesson = Lesson::create([
            'lesson_name' => 'lesson1',
            'preview' => 'this is lesson 1',
            'picture' => 'pic1.jpg',
            'topic_id' => '85',
        ]);

        $this->assertEquals('lesson1', $lesson->lesson_name);
    }
}
