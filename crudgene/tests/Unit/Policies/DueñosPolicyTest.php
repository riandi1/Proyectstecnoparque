<?php

namespace Tests\Unit\Policies;

use App\Models\Dueños;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class DueñosPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_dueños()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Dueños));
    }

    /** @test */
    public function user_can_view_dueños()
    {
        $user = $this->createUser();
        $dueños = Dueños::factory()->create();
        $this->assertTrue($user->can('view', $dueños));
    }

    /** @test */
    public function user_can_update_dueños()
    {
        $user = $this->createUser();
        $dueños = Dueños::factory()->create();
        $this->assertTrue($user->can('update', $dueños));
    }

    /** @test */
    public function user_can_delete_dueños()
    {
        $user = $this->createUser();
        $dueños = Dueños::factory()->create();
        $this->assertTrue($user->can('delete', $dueños));
    }
}
