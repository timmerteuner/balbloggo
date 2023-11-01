<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class TeunTest extends TestCase
{

    public function test_if_main_page_exists(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_adding_user(): void
    {
        $data = [
            'name' => 'TEUN',
            'email' => 'teun@teungerrits.nl',
            'password' => 'Test123!'
        ];

        $response = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $response->assertStatus(200);
    }

    public function test_post () {
        $data = [
            'name' => 'TEUN',
            'email' => 'teun@teungerrits.nl',
            'password' => 'Test123!',
        ];

        $response = $this->post('/api/test', $data);

        $response->assertStatus(200) 
                ->assertJson($data); 
    }

    public function test_db_is_connected () {
        try {
            $connection = app('db')->connection();
            $this->assertTrue($connection->getPdo() !== null);
        } catch (\Exception $e) {
            $this->fail('Neef de database is bokko.');
        }
    }

    public function test_teuns_mail_exists_in_database () {
        $this->assertDatabaseHas('users', [
            'email' => 'teun@teungerrits.nl',
        ]);
    }

    public function test_pronk_tower_exists_in_database () {
        $this->assertDatabaseHas('posts', [
            'title' => 'Wanneer bouwen we de pronk toren?',
        ]);
    }

    public function test_teungerrits_endpoint_is_online(): void
    {
        $response = $this->get('https://teungerrits.nl');

        $response->assertStatus(200);
    }

    public function test_add_two_numbers_using_api(): void
    {
        $data = [
            'num1' => 54543,
            'num2' => 750
        ];

        $response = $this->post('/api/addnumbers', $data); // eigenlijk zitten we hier de response gewoon te testen

        $response->assertStatus(200) 
            ->assertSeeText(json_decode($response->getContent())->result); 
    }
}
