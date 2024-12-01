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
        
        <h2 class="masthead page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top: 5rem;">Lista pacjentów</h2>

        <form action="{{ route('patient.search') }}" method="GET" id="searchForm" class="mb-4">
            <div class="form-floating mb-3">
                <input 
                    class="form-control" 
                    id="search-name" 
                    name="name" 
                    type="text" 
                    placeholder="Wyszukaj pacjenta po imieniu i nazwisku" 
                    maxlength="30" 
                    required 
                />
                <label for="search-name">Wyszukaj pacjenta</label>
            </div>
            <button type="submit" class="btn btn-primary">Szukaj</button>
        </form>

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
                @foreach ($clinic as $clinical)
                    <tr>
                        <th scope="row">{{ $clinical->id }}</th>
                        <td>{{ $clinical->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($clinical->date)->format('d-m-Y') }}</td>
                        <td>{{ $clinical->phone }}</td>
                        <td>{{ $clinical->mail }}</td>
                        <td>{{ $clinical->doctor ? $clinical->doctor->name : 'Brak lekarza' }}</td>
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

        <div>
            {{ $clinic->links() }}
        </div>

    </div>
</section>
@endsection
