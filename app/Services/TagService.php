<?php

namespace App\Services;

class TagService
{
    /**
     * Find tags that appear in both lists (e.g. product tags vs. search filters).
     *
     * @param  string[]  $a
     * @param  string[]  $b
     * @return string[]
     */
    public function matching(array $a, array $b): array
    {
        $matches = [];

        foreach ($a as $tagA) {
            foreach ($b as $tagB) {
                if ($tagA === $tagB) {
                    $matches[] = $tagA;
                }
            }
        }

        return array_values(array_unique($matches));
    }
}
