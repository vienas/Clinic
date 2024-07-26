@extends('layouts.app')

@section('content')
<!-- Contact Section-->
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

        <div class="divider-custom-line"></div>
        <h2 class="masthead page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top: 5rem;">Lista pacjentów</h2>

        <!-- @if ($klinika->isEmpty())
            <p class="text-center">Brak pacjentów do wyświetlenia</p>
        @else -->
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imię i nazwisko</th>
                        <th scope="col">Data</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Lekarz</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($klinika as $klinik)
                        <tr>
                            <th scope="row">{{ $klinik->id }}</th>
                            <td>{{ $klinik->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($klinik->date)->format('d-m-Y') }}</td>
                            <td>{{ $klinik->phone }}</td>
                            <td>{{ $klinik->mail }}</td>
                            <td>{{ $klinik->doctor }}</td>
                            <td><a href="{{ route('patient.edit', ['id' => $klinik->id]) }}" class="btn btn-outline-light">Edytuj</a>
                                    <form method="POST" action="{{ route('patient.delete', ['id' => $klinik->id]) }}">
                                
                                @csrf
                                @method('delete')
                            <button type="submit" class="btn btn-danger">Usuń</a></td>
                            </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <!-- @endif -->
    </div>
</section>
@endsection
