<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_when_opening_event_creation_page(): void
    {
        $response = $this->get('/events/create');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_open_event_creation_page(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/events/create');

        $response->assertOk();
    }

    public function test_event_with_end_date_before_start_date_is_rejected(): void
    {
        $user = User::factory()->create();

        $organization = Organization::create([
            'name' => 'Test Organization',
            'slug' => 'test-organization',
        ]);

        $user->organizations()->attach($organization->id, [
            'role' => 'owner',
        ]);

        $response = $this
            ->actingAs($user)
            ->from('/events/create')
            ->post('/events', [
                'organization_id' => $organization->id,
                'name' => 'Test Event',
                'slug' => 'test-event',
                'starts_at' => '2026-11-10 10:00:00',
                'ends_at' => '2026-11-10 09:00:00',
            ]);

        $response
            ->assertRedirect('/events/create')
            ->assertSessionHasErrors('ends_at');

        $this->assertDatabaseMissing('events', [
            'slug' => 'test-event',
        ]);
    }
}
