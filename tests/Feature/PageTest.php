<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_pages()
    {
        //make GET request to endpoint /list_pages

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('GET', '/list_pages');

        $response->assertStatus(200);
    }

    public function test_a_page_requires_a_title() 
    {
        //make a POST request to endpoint /add_page
        $page = factory('App\Page')->create(['page_title' => null]);

        $this->post(route('add_page'), $page->toArray());

        $this->assertSessionHasErrors('page_title');

        $response->assertStatus(400);
    }

    public function test_a_page_requires_content() 
    {
        //make a POST request to endpoint /add_page
        $page = factory('App\Page')->create(['page_content' => null]);

        $this->post(route('add'), $page->toArray());

        $this->assertSessionHasErrors('page_content');
        
        $response->assertStatus(400);
    }

    public function test_add_page() {
        //make a POST request to endpoint add_page
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', 'add');

        $response->assertStatus(201)->assertJson(['created' => true]);
    }
}
