<section>
    <header>
        <h2 class="h5 font-weight-bold text-dark">
            {{ __('Zmiana hasła') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __('Upewnij się, że konto użytkownika używa długiego, losowego hasła, aby zachować bezpieczeństwo.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Aktualne hasło') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control @error('updatePassword.current_password') is-invalid @enderror" autocomplete="current-password">
            @error('updatePassword.current_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('Nowe hasło') }}</label>
            <input id="update_password_password" name="password" type="password" class="form-control @error('updatePassword.password') is-invalid @enderror" autocomplete="new-password">
            @error('updatePassword.password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Potwierdź hasło') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control @error('updatePassword.password_confirmation') is-invalid @enderror" autocomplete="new-password">
            @error('updatePassword.password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-gray-600" id="password-updated-message">{{ __('Saved.') }}</p>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(function() {
                            document.getElementById('password-updated-message').style.display = 'none';
                        }, 2000);
                    });
                </script>
            @endif
        </div>
    </form>
</section>

