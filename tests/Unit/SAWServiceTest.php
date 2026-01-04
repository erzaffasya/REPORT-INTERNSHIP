<?php

namespace Tests\Unit;

use App\Services\SAWService;
use Tests\TestCase;

class SAWServiceTest extends TestCase
{
    protected SAWService $sawService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sawService = new SAWService();
    }

    /**
     * Test perhitungan SAW dengan mock data
     */
    public function test_saw_calculation_with_sample_data()
    {
        $talents = collect([
            (object)['name' => 'Programming', 'pivot' => (object)['score' => 8]],
            (object)['name' => 'Design', 'pivot' => (object)['score' => 6]],
            (object)['name' => 'Communication', 'pivot' => (object)['score' => 7]],
        ]);

        $weights = [
            'Programming' => 5,
            'Design' => 3,
            'Communication' => 2,
        ];

        // Expected: (0.8 × 0.5) + (0.6 × 0.3) + (0.7 × 0.2) = 0.72
        $reflection = new \ReflectionClass($this->sawService);
        $method = $reflection->getMethod('calculateSAW');
        $method->setAccessible(true);
        
        $result = $method->invoke($this->sawService, $talents, $weights);

        $this->assertEquals(0.72, $result);
    }

    /**
     * Test SAW dengan user yang tidak punya semua talent
     */
    public function test_saw_with_missing_talents()
    {
        $talents = collect([
            (object)['name' => 'Programming', 'pivot' => (object)['score' => 10]],
        ]);

        $weights = [
            'Programming' => 5,
            'Design' => 5,
        ];

        // Expected: (1.0 × 0.5) + (0 × 0.5) = 0.5
        $reflection = new \ReflectionClass($this->sawService);
        $method = $reflection->getMethod('calculateSAW');
        $method->setAccessible(true);
        
        $result = $method->invoke($this->sawService, $talents, $weights);

        $this->assertEquals(0.5, $result);
    }

    /**
     * Test service dapat di-instantiate
     */
    public function test_service_instantiation()
    {
        $this->assertInstanceOf(SAWService::class, $this->sawService);
    }
}

