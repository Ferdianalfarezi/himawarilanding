<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingLanguageTest extends TestCase
{
    public function test_home_page_is_shown_in_indonesian(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('<html lang="id">', false);
        $response->assertSee('Pertanyaan yang');
        $response->assertDontSee('Frequently asked');
    }

    public function test_english_page_is_shown_in_english(): void
    {
        $response = $this->get(route('home.en'));

        $response->assertOk();
        $response->assertSee('<html lang="en">', false);
        $response->assertSee('Frequently asked');
        $response->assertSee('Max. 10 children');
        $response->assertDontSee('Pertanyaan yang');
    }

    public function test_language_switch_links_to_both_languages(): void
    {
        $response = $this->get(route('home'));

        $response->assertSee('href="'.route('home').'"', false);
        $response->assertSee('href="'.route('home.en').'"', false);
    }
}
