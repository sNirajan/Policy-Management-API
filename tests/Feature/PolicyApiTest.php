<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Policy;

class PolicyApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_policies()
    {
        // Arrange: create 3 policies
        Policy::factory()->count(3)->create();

        // Act: hit the API endpoint
        $response = $this->getJson('/api/policies');

        // Assert: check status and structure
        $response->assertOk()
                 ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_create_a_policy()
    {
        // Arrange: prepare payload
        $payload = [
            'policy_number' => 'POL-123',
            'customer_name' => 'John Doe',
            'premium_amount' => 1000.50,
            'status' => 'active',
        ];

        // Act: hit the POST endpoint
        $response = $this->postJson('/api/policies', $payload);

        // Assert: status and DB
        $response->assertCreated()
                 ->assertJsonFragment(['policy_number' => 'POL-123']);

        $this->assertDatabaseHas('policies', ['policy_number' => 'POL-123']);
    }

    /** @test */
    public function it_can_update_a_policy()
    {
        // Arrange
        $policy = Policy::factory()->create([
            'status' => 'active',
        ]);

        // Act
        $response = $this->putJson("/api/policies/{$policy->id}", [
            'status' => 'cancelled',
        ]);

        // Assert
        $response->assertOk()
                 ->assertJsonFragment(['status' => 'cancelled']);

        $this->assertDatabaseHas('policies', ['id' => $policy->id, 'status' => 'cancelled']);
    }

    /** @test */
    public function it_can_delete_a_policy()
    {
        // Arrange
        $policy = Policy::factory()->create();

        // Act
        $response = $this->deleteJson("/api/policies/{$policy->id}");

        // Assert
        $response->assertOk()
                 ->assertJson(['message' => 'Policy deleted successfully']);

        $this->assertDatabaseMissing('policies', ['id' => $policy->id]);
    }
}
