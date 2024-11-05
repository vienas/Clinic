@extends('layouts.app')

@section('content')
<section class="page-section" id="contact">
    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close text-success" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="divider-custom-line"></div>
        <h2 class="masthead page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top: 5rem;">Mój pacjent</h2>

        <table class="table table-striped table-dark mt-4">
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
                @foreach ($clinic as $clinics)
                    <tr>
                        <th scope="row">{{ $clinics->id }}</th>
                        <td>{{ $clinics->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($clinics->date)->format('d-m-Y') }}</td>
                        <td>{{ $clinics->phone }}</td>
                        <td>{{ $clinics->mail }}</td>
                        <td>{{ $clinics->doctor->name }}</td>
                            <td>
                                <div class="d-inline-flex">
                                    <a href="{{ route('patient.edit', ['id' => $clinics->id]) }}" class="btn btn-outline-light me-2">Edytuj</a>
                                    <form method="POST" action="{{ route('patient.delete', ['id' => $clinics->id]) }}">
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

        <div>
            {{-- {{ $clinic->links() }} --}}
        </div>

    </div>
</section>
@endsection
