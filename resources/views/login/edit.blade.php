@extends('layouts.app')

@section('content')

<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">

        <h2 class="masthead page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top: 5rem;">Edytujesz pacjenta {{ $klinika->name }}</h2>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <form action="{{ route('patient.update', ['id' => $klinika->id]) }}" method="POST" id="contactForm" name="sentMessage" >
                    {{ csrf_field() }}
                    
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input value="{{ $klinika->name }}" class="form-control" id="name" name="name" type="text" placeholder="Imię i Nazwisko" data-sb-validations="required" />
                        <label for="number">Imię i Nazwisko</label>
                        <div class="invalid-feedback" data-sb-feedback="number:required">Imię i Nazwisko</div>
                    </div>

                    <div class="form-floating mb-3">
                        <input value="{{ $klinika->date }}" class="form-control" id="date" name="date" type="text" placeholder="Data wizyty" data-sb-validations="required" />
                        <label for="date">Data wizyty</label>
                        <div class="invalid-feedback" data-sb-feedback="date:required">Data wizyty</div>
                    </div>

                    <div class="form-floating mb-3">
                        <input value="{{ $klinika->phone }}" class="form-control" id="phone" name="phone" type="number" placeholder="Nummer telefonu" />
                        <label for="date">Nummer telefonu (opcjonalnie)</label>
                        <div class="invalid-feedback" data-sb-feedback="phone">Nummer telefonu</div>
                    </div>

                    <div class="form-floating mb-3">
                        <input value="{{ $klinika->mail }}" class="form-control" id="mail" name="mail" type="text" placeholder="Adres Email"  />
                        <label for="mail">Adres Email (opcjonalnie)</label>
                        <div class="invalid-feedback" data-sb-feedback="mail:required">An email is required.</div>
                        <!-- <div class="invalid-feedback" data-sb-feedback="mail:mail">Email is not valid.</div> -->
                    
                    <div class="form-floating mb-3">
                        <select value="{{ $klinika->doctor }}" class="form-control" id="doctor" name="doctor" placeholder="doctor" data-sb-validations="required" >
                            <option value="" disabled selected></option>
                            <option value="lek. Tadeusz Asnyk">lek. Tadeusz Asnyk</option>
                            <option value="lek. Anna Zawada">lek. Anna Zawada</option>
                            <option value="lek. Janusz Szwed">lek. Janusz Szwed</option>
                            <option value="lek. Krzysztof Wiecek">lek. Krzysztof Wiecek</option>
                        </select>
                        
                        <label for="doctor">Wybór Lekarza</label>
                        <div class="invalid-feedback" data-sb-feedback="doctor:required">Wybór Lekarza</div>
                    </div>
                        
                        <div id="success"></div>
                        <div class="form-group">
                        <button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Zapisz listę</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



@endsection