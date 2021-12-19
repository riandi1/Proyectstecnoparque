<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Dueños;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class DueñosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_dueños_has_name_link_attribute()
    {
        $dueños = Dueños::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $dueños->name, 'type' => __('dueños.dueños'),
        ]);
        $link = '<a href="'.route('dueños.show', $dueños).'"';
        $link .= ' title="'.$title.'">';
        $link .= $dueños->name;
        $link .= '</a>';

        $this->assertEquals($link, $dueños->name_link);
    }

    /** @test */
    public function a_dueños_has_belongs_to_creator_relation()
    {
        $dueños = Dueños::factory()->make();

        $this->assertInstanceOf(User::class, $dueños->creator);
        $this->assertEquals($dueños->creator_id, $dueños->creator->id);
    }
}
