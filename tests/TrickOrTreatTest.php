<?php

declare(strict_types=1);

namespace TBoileau\Kata\TrickOrTreat\Tests;

use PHPUnit\Framework\TestCase;
use TBoileau\Kata\TrickOrTreat\TrickOrTreat;

final class TrickOrTreatTest extends TestCase
{
    /**
     * @param array<array-key, array<array-key, string>> $packets
     *
     * @dataProvider provideExamples
     */
    public function testShouldReturnThankYouStrangeUncle(int $children, array $packets, string $result): void
    {
        $trickOrTreat = new TrickOrTreat();

        self::assertSame($result, $trickOrTreat($children, $packets));
    }

    public function provideExamples(): iterable
    {
        yield 'Don\'t mind apple' => [3, [["candy","apple","candy"],["candy","candy"],["candy","candy"]], 'Thank you, strange uncle!'];
        yield 'Each child has only got 1 candy' => [3, [["candy","apple"],["apple","candy"],["candy","apple"]], 'Trick or treat!'];
        yield 'The amount of candy are different' => [3, [["candy","apple","candy"],["candy","candy"],["candy","candy","candy"]], 'Trick or treat!'];
        yield 'One child has no candy' => [3, [["candy","apple","candy"],["candy","candy"]], 'Trick or treat!'];
        yield 'Some child got a bomb' => [3, [["candy","apple","candy"],["candy","candy"],["candy","bomb","candy"]], 'Trick or treat!'];
    }
}
