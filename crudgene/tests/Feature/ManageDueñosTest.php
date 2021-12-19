<?php

namespace Tests\Feature;

use App\Models\Dueños;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageDueñosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_dueños_list_in_dueños_index_page()
    {
        $dueños = Dueños::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('dueños.index');
        $this->see($dueños->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Dueños 1 name',
            'description' => 'Dueños 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_dueños()
    {
        $this->loginAsUser();
        $this->visitRoute('dueños.index');

        $this->click(__('dueños.create'));
        $this->seeRouteIs('dueños.create');

        $this->submitForm(__('dueños.create'), $this->getCreateFields());

        $this->seeRouteIs('dueños.show', Dueños::first());

        $this->seeInDatabase('dueños', $this->getCreateFields());
    }

    /** @test */
    public function validate_dueños_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('dueños.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_dueños_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('dueños.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_dueños_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('dueños.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Dueños 1 name',
            'description' => 'Dueños 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_dueños()
    {
        $this->loginAsUser();
        $dueños = Dueños::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('dueños.show', $dueños);
        $this->click('edit-dueños-'.$dueños->id);
        $this->seeRouteIs('dueños.edit', $dueños);

        $this->submitForm(__('dueños.update'), $this->getEditFields());

        $this->seeRouteIs('dueños.show', $dueños);

        $this->seeInDatabase('dueños', $this->getEditFields([
            'id' => $dueños->id,
        ]));
    }

    /** @test */
    public function validate_dueños_name_update_is_required()
    {
        $this->loginAsUser();
        $dueños = Dueños::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('dueños.update', $dueños), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_dueños_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $dueños = Dueños::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('dueños.update', $dueños), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_dueños_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $dueños = Dueños::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('dueños.update', $dueños), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_dueños()
    {
        $this->loginAsUser();
        $dueños = Dueños::factory()->create();
        Dueños::factory()->create();

        $this->visitRoute('dueños.edit', $dueños);
        $this->click('del-dueños-'.$dueños->id);
        $this->seeRouteIs('dueños.edit', [$dueños, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('dueños', [
            'id' => $dueños->id,
        ]);
    }
}
