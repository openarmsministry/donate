<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AmountSanitizerTest extends TestCase
{
    public function testSimpleStringValue()
    {
        $sanitizer = new App\Sanitizers\AmountSanitizer('11.12');
        $this->assertEquals((float) 11.12, $sanitizer->sanitize());
    }

    public function testIntegerStringValue()
    {
        $sanitizer = new App\Sanitizers\AmountSanitizer('10');
        $this->assertEquals((float) 10.00, $sanitizer->sanitize());
    }

    public function testThousandsStringValue()
    {
        $sanitizer = new App\Sanitizers\AmountSanitizer('1,000.12');
        $this->assertEquals((float) 1000.12, $sanitizer->sanitize());
    }

    public function testBadTextStringValue()
    {
        $sanitizer = new App\Sanitizers\AmountSanitizer('  10dollars   ');
        $this->assertEquals((float) 10.00, $sanitizer->sanitize());
    }
}
