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

        <div class="divider-custom-line"></div>
        <h2 class="masthead page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top: 5rem;">Lista pacjentów</h2>


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
                    @foreach ($clinic as $clinical)
                    <tr>
                        <th scope="row">{{ $clinical->id }}</th>
                        <td>{{ $clinical->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($clinical->date)->format('d-m-Y') }}</td>
                        <td>{{ $clinical->phone }}</td>
                        <td>{{ $clinical->mail }}</td>
                        <td>{{ $clinical->doctor }}</td>
                        <td>
                            <div class="d-inline-flex">

                                <a href="{{ route('patient.edit', ['id' => $clinical->id]) }}" class="btn btn-outline-light me-2">Edytuj</a>
                

                                <form method="POST" action="{{ route('patient.delete', ['id' => $clinical->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
    </div>
</section>
@endsection
