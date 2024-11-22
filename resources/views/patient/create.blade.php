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
        @elseif (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="btn-close text-danger" data-bs-dismiss="alert" aria-label="close">
                <span aria-hidden="true"></span>
            </button>
        </div>
        @endif

        <h2 class="masthead page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top: 5rem;">E-rejestracja</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <form action="{{ route('patient.store') }}" method="POST" >

                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" name="name" type="text" placeholder="Imię i Nazwisko" maxlength="30" required />
                        <label for="number">Imię i Nazwisko</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="date" name="date" type="text" placeholder="Data wizyty" required readonly />
                        <label for="date">Data wizyty</label>
                    </div>

                    <script>
                    $(function() {
                        $("#date").datepicker({
                            dateFormat: 'yy-mm-dd',
                            minDate: 0, 
                            onSelect: function(dateText, inst) {
                                $(this).val(dateText);
                            }
                        });
                    });
                    </script>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="phone" name="phone" type="tel" placeholder="Numer telefonu" minlength="9" maxlength="9" pattern="\d{9}" required />
                        <label for="phone">Numer telefonu</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="mail" name="mail" type="email" placeholder="Adres Email" maxlength="30" required />
                        <label for="mail">Adres email</label>
                    </div>
                    
                    <div class="form-floating mb-3 position-relative">
                        <input class="form-control" id="doctor-input" name="doctor_id" type="text" placeholder="Wybór lekarza" required readonly />
                        <label for="doctor-input">Wybór lekarza</label>
                        <select name="doctor_id" id="doctor-select" class="form-select position-absolute top-0 start-0 w-100 h-100 opacity-0" onchange="updateInput()" required>
                            <option style="display:none">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <script>
                        function updateInput() {
                            var select = document.getElementById('doctor-select');
                            var input = document.getElementById('doctor-input');
                            input.value = select.options[select.selectedIndex].text;
                        }
                    </script>

                    <div id="success"></div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Wyślij formularz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection