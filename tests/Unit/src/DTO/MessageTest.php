<?php

namespace Tests\Unit\src\DTO;

use PHPUnit\Framework\TestCase;
use Src\DTO\Message;

/** @covers \Src\DTO\Message */
class MessageTest extends TestCase
{
    public function testMessageDTO(): void
    {
        $message = "Some msg";
        $sut = new Message();
        self::assertFalse($sut->hasMessage());
        $sut->setMessage($message);
        self::assertTrue($sut->hasMessage());
        self::assertSame($sut->getMessage());
    }
}
