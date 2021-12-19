<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_vehicle_has_name_link_attribute()
    {
        $vehicle = Vehicle::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $vehicle->name, 'type' => __('vehicle.vehicle'),
        ]);
        $link = '<a href="'.route('vehicles.show', $vehicle).'"';
        $link .= ' title="'.$title.'">';
        $link .= $vehicle->name;
        $link .= '</a>';

        $this->assertEquals($link, $vehicle->name_link);
    }

    /** @test */
    public function a_vehicle_has_belongs_to_creator_relation()
    {
        $vehicle = Vehicle::factory()->make();

        $this->assertInstanceOf(User::class, $vehicle->creator);
        $this->assertEquals($vehicle->creator_id, $vehicle->creator->id);
    }
}
