<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Usuń konto') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Po usunięciu konta wszystkie jego zasoby i dane zostaną trwale usunięte. Proszę wprowadzić hasło, aby potwierdzić, że chcesz trwale usunąć swoje konto.') }}
        </p>
    </header>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Usuń konto') }}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('Czy na pewno chcesz usunąć swoje konto?') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <p>{{ __('Po usunięciu konta wszystkie jego zasoby i dane zostaną trwale usunięte. Proszę wprowadzić hasło, aby potwierdzić, że chcesz trwale usunąć swoje konto.') }}</p>

                        <div class="mt-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}" required>
                            @if($errors->userDeletion->get('password'))
                                <div class="invalid-feedback d-block mt-2">
                                    {{ $errors->userDeletion->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Anuluj') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Usuń konto') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Include Bootstrap JS for modal functionality -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybO7zQAmCt1yY59Y31OG8RfvtWIs6jz5Q3Ukl4kg+eZr1EcUc" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Q6wdfY6GogH4T+KQj+zDQGmPjtILj5OGCUj7zz5of2i8r8LZcAz4+D4V2Ag/zaXR" crossorigin="anonymous"></script>
