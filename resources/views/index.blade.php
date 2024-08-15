@extends('layouts.app')

@section('content')

        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">

                <img class="masthead-avatar mb-5" src="{{ asset('assets/img/avataaars.svg')}}" alt="..." />

                <h1 class="masthead-heading text-uppercase mb-0">Sport-Klinika</h1>

                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                <p class="masthead-subheading font-weight-light mb-0">„aby ruch był przyjemnością od diagnozy do rehabilitacji”</p>
            </div>
        </header>
        

@endsection