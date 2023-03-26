<?php

namespace Tests\Feature;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase
{
    /** @test */
    public function testSoma()
    {
        $resultado = 2+2;
        $this->assertEquals(4, $resultado);
    }
}