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
    public function test_check_if_user_can_add_double_reservation(): void
    {   
        $user = User::factory(5)->create();
        $this->assertDatabaseEmpty('clinic');
 
        $this->browse(function (Browser $browser) {
            $browser->visit('/pacjent/dodaj')
            ->assertPathIs('/pacjent/dodaj')
            ->assertSee('E-REJESTRACJA')
            ->type('name', 'Jan Kowalski')
            ->click('input[name="date"]')
            ->click('.ui-datepicker-today')
            ->type('phone', '777555999')
            ->type('mail', 'jan@kowalski.pl')
            ->click('#doctor-select')
            ->click('#doctor-select option[value="5"]')
            ->click('#sendMessageButton')
            ->assertSee('Twoja wizyta została zarejestrowana, dziękujemy!');

            $browser->visit('/pacjent/dodaj')
            ->assertPathIs('/pacjent/dodaj')
            ->assertSee('E-REJESTRACJA')
            ->type('name', 'Jan Kowalski')
            ->click('input[name="date"]')
            ->click('.ui-datepicker-today')
            ->type('phone', '777555999')
            ->type('mail', 'jan@kowalski.pl')
            ->click('#doctor-select')
            ->click('#doctor-select option[value="5"]')
            ->click('#sendMessageButton')
            ->assertSee('Ta data jest już zajęta. Wybierz inną datę lub lekarza.');
        });

        $this->assertDatabaseCount('clinic', 1);

    }
}