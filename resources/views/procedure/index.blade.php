@extends('layouts.app')

@section('content')

<section class="page-section portfolio" id="portfolio">
    <div class="container mb-2">
        <h2 class="masthead page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top: 5rem;">Lista zabiegów</h2>
        <div class="row justify-content-center">

            <div class="accordion accordion-flush" id="accordionFlushExample">

                <div class="accordion-item mb-2">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <span class="badge bg-primary rounded-pill">BARK</span>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                <li>Rekonstrukcja ścięgna głowy długiej bicepsa</li>
                                <li>Rekonstrukcja stożka rotatorów stawu ramiennego</li>
                                <li>Tenodeza ścięgna bicepsa (długiej głowy mięśnia dwugłowego ramienia)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item mb-2">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <span class="badge bg-primary rounded-pill">KOLANO</span>
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                <li>Przeszczep łąkotki allogenicznej (od dawcy)</li>
                                <li>Rekonstrukcja więzadła MPFL (troczka przyśrodkowego)</li>
                                <li>Endoprotezoplastyka stawu kolanowego całkowita lub połowicza</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item mb-2">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            <span class="badge bg-primary rounded-pill">BIODRO</span>
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                <li>Leczenie martwicy głowy kości udowej</li>
                                <li>Artroskopowe leczenie konfliktu udowo-panewkowego (FAI)</li>
                                <li>Endoprotezoplastyka stawu biodrowego</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item mb-2">
                    <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            <span class="badge bg-primary rounded-pill">RĘKA</span>
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                <li>Leczenie zespołu cieśni nadgarstka</li>
                                <li>Leczenie choroby Dupuytrena</li>
                                <li>Artroskopie w obrębie nadgarstka oraz małych stawów ręki</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
