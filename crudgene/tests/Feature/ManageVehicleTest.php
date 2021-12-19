<?php

namespace Tests\Feature;

use App\Models\Vehicle;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageVehicleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_vehicle_list_in_vehicle_index_page()
    {
        $vehicle = Vehicle::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('vehicles.index');
        $this->see($vehicle->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Vehicle 1 name',
            'description' => 'Vehicle 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_vehicle()
    {
        $this->loginAsUser();
        $this->visitRoute('vehicles.index');

        $this->click(__('vehicle.create'));
        $this->seeRouteIs('vehicles.create');

        $this->submitForm(__('vehicle.create'), $this->getCreateFields());

        $this->seeRouteIs('vehicles.show', Vehicle::first());

        $this->seeInDatabase('vehicles', $this->getCreateFields());
    }

    /** @test */
    public function validate_vehicle_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('vehicles.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_vehicle_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('vehicles.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_vehicle_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('vehicles.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Vehicle 1 name',
            'description' => 'Vehicle 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_vehicle()
    {
        $this->loginAsUser();
        $vehicle = Vehicle::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('vehicles.show', $vehicle);
        $this->click('edit-vehicle-'.$vehicle->id);
        $this->seeRouteIs('vehicles.edit', $vehicle);

        $this->submitForm(__('vehicle.update'), $this->getEditFields());

        $this->seeRouteIs('vehicles.show', $vehicle);

        $this->seeInDatabase('vehicles', $this->getEditFields([
            'id' => $vehicle->id,
        ]));
    }

    /** @test */
    public function validate_vehicle_name_update_is_required()
    {
        $this->loginAsUser();
        $vehicle = Vehicle::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('vehicles.update', $vehicle), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_vehicle_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $vehicle = Vehicle::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('vehicles.update', $vehicle), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_vehicle_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $vehicle = Vehicle::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('vehicles.update', $vehicle), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_vehicle()
    {
        $this->loginAsUser();
        $vehicle = Vehicle::factory()->create();
        Vehicle::factory()->create();

        $this->visitRoute('vehicles.edit', $vehicle);
        $this->click('del-vehicle-'.$vehicle->id);
        $this->seeRouteIs('vehicles.edit', [$vehicle, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('vehicles', [
            'id' => $vehicle->id,
        ]);
    }
}
