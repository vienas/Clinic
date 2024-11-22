<?php
 
namespace Tests\Browser;
 
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
 
class AddReservationTest extends DuskTestCase
{
    use DatabaseMigrations;
 
    /**
     * A basic browser test example.
     */
    public function test_basic_example(): void
    {
        // $user = User::factory()->create([
        //     'email' => 'taylor@laravel.com',
        // ]);
 
        $this->browse(function (Browser $browser) {
            $browser->visit('/pacjent/dodaj')
            ->assertSee('E-rejestracja');


        });
    }
}