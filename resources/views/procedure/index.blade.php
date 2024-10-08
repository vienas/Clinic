@extends('layouts.app')

@section('content')

<section class="page-section portfolio" id="portfolio">
    <div class="container mb-2">
        <h2 class="masthead page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top: 5rem;">Lista zabiegów</h2>
        <div class="row justify-content-center">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <form action="{{ route('procedure.index') }}" method="GET" id="contactForm" name="sentMessage">
                    
                    <style>
                        .custom-gradient {
                            color: black;
                            padding: 0.5rem;
                            font-size: 1.2rem;
                            text-transform: uppercase; 
                        }
                        .accordion-body {
                            background-color: #f7fff6;
                            padding: 10px;
                            border-radius: 8px;
                        }
                    </style>

                    @foreach ($procedure_catergories as $procedure_catergory)
                        <div class="accordion-item mb-2">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $procedure_catergory->id }}">
                                    <span class="badge custom-gradient">{{ $procedure_catergory->name }}</span>
                                </button>
                            </h2>
                            <div id="flush-collapse-{{ $procedure_catergory->id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <ul>
                                        @foreach($procedures->where('procedure_category_id', $procedure_catergory->id) as $procedure)
                                            <li>{{ $procedure->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </form>
            </div>
        </div>
    </div>
</section>

@endsection
