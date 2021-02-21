<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KitchenSinkTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();

        $this->be($user);
    }

    /** @test */
    public function can_view_tables_page()
    {
        $this->get(route('kitchen-sink.tables'))
            ->assertSuccessful()
            ->assertSeeLivewire('kitchen-sink.tables');
    }

    /** @test */
    public function can_view_forms_page()
    {
        $this->get(route('kitchen-sink.forms'))
            ->assertSuccessful()
            ->assertSeeLivewire('kitchen-sink.forms');
    }

    /** @test */
    public function can_view_cards_page()
    {
        $this->get(route('kitchen-sink.cards'))
            ->assertSuccessful()
            ->assertSeeLivewire('kitchen-sink.cards');
    }

    /** @test */
    public function can_view_charts_page()
    {
        $this->get(route('kitchen-sink.charts'))
            ->assertSuccessful()
            ->assertSeeLivewire('kitchen-sink.charts');
    }

    /** @test */
    public function can_view_buttons_page()
    {
        $this->get(route('kitchen-sink.buttons'))
            ->assertSuccessful()
            ->assertSeeLivewire('kitchen-sink.buttons');
    }

    /** @test */
    public function can_view_modals_page()
    {
        $this->get(route('kitchen-sink.modals'))
            ->assertSuccessful()
            ->assertSeeLivewire('kitchen-sink.modals');
    }
}
