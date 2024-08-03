@extends('layouts.app')

@section('content')

<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="masthead page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top: 5rem;">E-rejestracja</h2>

        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <form action="{{ route('patient.store') }}" method="POST" >
                    {{ csrf_field() }}

                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" name="name" type="text" placeholder="Imię i Nazwisko" maxlength="30" required />
                        <label for="number">Imię i Nazwisko</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="date" name="date" type="text" placeholder="Data wizyty" pattern="\d{4}-\d{2}-\d{2}" maxlength="10" required />
                        <label for="date">Data wizyty</label>
                        <div class="invalid-feedback">
                            Wprowadź poprawną datę wizyty.
                        </div>
                    </div>

                    <!-- jQuery UI Datepicker -->
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
                        <div class="invalid-feedback">
                            Wprowadź poprawny numer telefonu.
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="mail" name="mail" type="email" placeholder="Adres Email" maxlength="30" required/>
                        <label for="mail">Adres email</label>
                        <div class="invalid-feedback">
                            Wprowadź poprawny adres email.
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" id="doctor" name="doctor" placeholder="doctor" required >
                            <option value="" disabled selected></option>
                            <option value="lek. Tadeusz Asnyk">lek. Tadeusz Asnyk</option>
                            <option value="lek. Anna Zawada">lek. Anna Zawada</option>
                            <option value="lek. Janusz Szwed">lek. Janusz Szwed</option>
                            <option value="lek. Krzysztof Wiecek">lek. Krzysztof Wiecek</option>
                        </select>
                        
                        <label for="doctor">Wybór Lekarza</label>
                        </div>
                        
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