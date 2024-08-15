@extends('layouts.app')

@section('content')

<section class="page-section" id="contact">
<div class="container">
    
        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close text-success" data-bs-dismiss="alert" aria-label="close">
                <span aria-hidden="true"></span>
            </button>
        </div>
        @endif

        <div class="row justify-content-center" style="margin-top: 5rem; margin-bottom: 3rem;">
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
</section>
@endsection
