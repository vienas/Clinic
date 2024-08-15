<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Zmiana hasła') }}
        </h2>

        <p class="mt-2 text-muted">
            {{ __('Upewnij się, że konto użytkownika używa długiego, losowego hasła, aby zachować bezpieczeństwo.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4" onsubmit="return checkPasswordMatch();">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Aktualne hasło') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" minlength="8" required>
            @if($errors->updatePassword->has('current_password'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('Nowe hasło') }}</label>
            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" minlength="8" required>
            @if($errors->updatePassword->has('password'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->first('password') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Potwierdź hasło') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" minlength="8" required>
            @if($errors->updatePassword->has('password_confirmation'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </div>
            @endif
            <!-- This error message will be shown only when the passwords do not match -->
            <div class="text-danger mt-2" id="password-match-error" style="display: none;">
                {{ __('Hasła muszą być takie same.') }}
            </div>
        </div>

        <div class="d-flex justify-content-start mt-4">
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
