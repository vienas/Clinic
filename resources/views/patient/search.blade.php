@extends('layouts.app')

@section('content')
<section class="page-section" id="patients">
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
                <input class="form-control" id="search-name" name="name" type="text" placeholder="Wyszukaj pacjenta po imieniu i nazwisku" maxlength="30" required />
                <label for="search-name">Wyszukaj pacjenta</label>
            </div>
            <button type="submit" class="btn btn-primary">Szukaj</button>
        </form>

        @if(isset($searchResults) && count($searchResults) > 0)
            <h4 class="text-center text-uppercase text-secondary mb-4">Wyniki wyszukiwania:</h4>
            <table class="table table-striped table-dark mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imię i nazwisko</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Data</th>
                        <th scope="col">Lekarz</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($searchResults as $result)
                        <tr>
                            <th scope="row">{{ $result->id }}</th>
                            <td>{{ $result->name }}</td>
                            <td>{{ $result->phone }}</td>
                            <td>{{ $result->mail }}</td>
                            <td>{{ \Carbon\Carbon::parse($result->date)->format('d-m-Y') }}</td>
                            <td>{{ $result->doctor ? $result->doctor->name : 'Brak lekarza' }}</td>
                            <td>
                                <div class="d-inline-flex">
                                    <a href="{{ route('patient.edit', ['id' => $result->id]) }}" class="btn btn-outline-light me-2">Edytuj</a>
                                    <form method="POST" action="{{ route('patient.delete', ['id' => $result->id]) }}">
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
        @elseif(isset($searchResults) && count($searchResults) == 0)
            <div class="alert alert-warning text-center mt-3">Nie znaleziono wyników dla zapytania: <strong>"{{ $query }}"</strong>.</div>
        @else
            <h4 class="text-center text-uppercase text-secondary mb-4">Lista pacjentów:</h4>
            <table class="table table-striped table-dark mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imię i nazwisko</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Data</th>
                        <th scope="col">Lekarz</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clinic as $clinical)
                        <tr>
                            <th scope="row">{{ $clinical->id }}</th>
                            <td>{{ $clinical->name }}</td>
                            <td>{{ $clinical->phone }}</td>
                            <td>{{ $clinical->mail }}</td>
                            <td>{{ \Carbon\Carbon::parse($clinical->date)->format('d-m-Y') }}</td>
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
        @endif

        <div>
            {{ $searchResults->links() }}
        </div>

    </div>
</section>
@endsection