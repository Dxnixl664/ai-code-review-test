<?php

namespace Tests\Unit;

use App\Services\TagService;
use Tests\TestCase;

class TagServiceTest extends TestCase
{
    public function test_finds_matching_tags(): void
    {
        $service = new TagService();

        $matches = $service->matching(['red', 'blue', 'green'], ['blue', 'yellow']);

        $this->assertEquals(['blue'], $matches);
    }
}
