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


            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa zabiegu</th>
                        <th scope="col"></th>
                        <th scope="col">E-mail</th>
                        <th scope="col">PESEL</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                        <tr>
                            <th scope="row">{{ $patient->id }}</th>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ $patient->mail }}</td>
                            <td>{{ $patient->idnumber }}</td>
                            <td><a href="{{ route('procedure.edit', ['zabieg' => $procedure->zabieg]) }}" class="btn btn-outline-light">Edytuj</a>
                                    <form method="POST" action="{{ route('procedure.destroy', ['zabieg' => $procedure->zabieg]) }}">
                                
                                @csrf
                                @method('delete')
                            <button type="submit" class="btn btn-danger">Usuń</a></td>
                            </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</section>
@endsection
