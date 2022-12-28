<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_empty_projects_home_page()
    {
        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee('No projects yet');
    }

    public function test_projects_home_page_with_data()
    {
        $project = Project::factory()->create();

        $this->withoutExceptionHandling();

        $this
            ->assertNotEmpty([
                $project->name,
                $project->execution_date,
            ]);

        $response = $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee($project->name)
            ->assertSee($project->execution_date)
            ->assertDontSee('No projects yet');
    }
}
