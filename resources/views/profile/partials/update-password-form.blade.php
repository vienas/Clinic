<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Zmiana hasła') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Upewnij się, że konto użytkownika używa długiego, losowego hasła, aby zachować bezpieczeństwo.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6" onsubmit="return checkPasswordMatch();">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Aktualne hasło')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password"  minlength="8" required />      
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Nowe hasło')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" minlength="8" required/>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Potwierdź hasło')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" minlength="8" required />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            <div class="invalid-feedback" id="password-match-error" style="display: none; color: red;">
                {{ __('Hasła muszą być takie same.') }}
            </div>
        </div>

        <div class="flex items-center gap-4">
        <button type="submit" class="btn btn-primary">{{ __('Zapisz') }}</button>
        </div>
    </form>
</section>

<script>
    function checkPasswordMatch() {
        const password = document.getElementById('update_password_password').value;
        const confirmPassword = document.getElementById('update_password_password_confirmation').value;
        const errorDiv = document.getElementById('password-match-error');

        if (password !== confirmPassword) {
            errorDiv.style.display = 'block';
            return false;
        }

        errorDiv.style.display = 'none';
        return true;
    }
</script>
