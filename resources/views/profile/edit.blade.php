@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 10rem; margin-bottom: 10rem;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profil użytkownika') }}</div>

                <div class="card-body">
                    <div class="mb-4">
                        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
