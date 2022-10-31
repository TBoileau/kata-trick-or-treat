<?php

declare(strict_types=1);

namespace TBoileau\Kata\TrickOrTreat;

final class TrickOrTreat
{
    /**
     * @param array<array-key, array<array-key, string>> $packets
     * @return string
     */
    public function __invoke(int $children, array $packets): string
    {
        if (count($packets) < $children) {
            return 'Trick or treat!';
        }

        $tempNumberOfCandies = null;

        foreach ($packets as $packet) {
            $countItems = array_count_values($packet);

            if (isset($countItems['bomb'])) {
                return 'Trick or treat!';
            }

            if (!isset($countItems['candy']) || $countItems['candy'] < 2) {
                return 'Trick or treat!';
            }

            if ($tempNumberOfCandies !== null && $tempNumberOfCandies !== $countItems['candy']) {
                return 'Trick or treat!';
            }

            $tempNumberOfCandies = $countItems['candy'];
        }

        return 'Thank you, strange uncle!';
    }
}
