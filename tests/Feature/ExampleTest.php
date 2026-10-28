<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_all_nine_idea_erp_pages_and_exports_work_with_postgresql(): void
    {
        $routes = [
            '/' => 'IDEA ERP',
            '/admission' => 'Admission Management',
            '/finance' => 'Finance Overview',
            '/students' => 'Student Management',
            '/assessments' => 'Assessment &amp; Certification',
            '/placements' => 'Career &amp; Placement',
            '/partners' => 'Industry Partners',
            '/alumni' => 'Alumni Tracking',
            '/reports' => 'Reports &amp; Analytics',
        ];

        foreach ($routes as $uri => $expectedText) {
            $response = $this->get($uri);
            $response->assertStatus(200);
            $response->assertSee($expectedText, false);
        }

        // Verify CSV export endpoint works against PostgreSQL views
        foreach (['admission', 'finance', 'students', 'placement', 'alumni'] as $exportType) {
            $exportResponse = $this->get("/reports/export/{$exportType}");
            $exportResponse->assertStatus(200);
        }
    }
}
