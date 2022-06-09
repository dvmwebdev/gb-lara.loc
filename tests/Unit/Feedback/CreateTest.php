<?php

namespace Feedback;

use App\Models\Feedback;
use Tests\TestCase;

class CreateTest extends TestCase
{
    public function testCreate()
    {
        $feedbackNew = Feedback::create([
            'user_id' => 2,
            'content' => 'sdsdfdsafsa',
        ]);

        self::assertNotEmpty($feedbackNew);
        self::assertEquals(null, $feedbackNew->image);

    }

}
