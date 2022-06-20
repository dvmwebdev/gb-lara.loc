<?php

namespace Feedback;

use App\Models\Feedback;
use Tests\TestCase;

class CreateTest extends TestCase
{
    public function testCreate()
    {
        $user_id = random_int(1, 10);
        $feedbackNew = new Feedback();
        $feedbackNew->user_id = $user_id;
        $feedbackNew->content = 'sadasasdas';
        $feedbackNew->image = 'sadasasdas.jpg';

        self::assertNotEmpty($feedbackNew);
        self::assertEquals('sadasasdas.jpg', $feedbackNew->image);
        self::assertEquals($user_id, $feedbackNew->user_id);
        self::assertEquals('sadasasdas', $feedbackNew->content);
        self::assertEquals(0, $feedbackNew->moderate);
    }

}
