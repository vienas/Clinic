@extends('layouts.app')

@section('content')

<section class="page-section portfolio" id="portfolio">
    <div class="container mb-2">
        <h2 class="masthead page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top: 5rem; padding-bottom: 10rem;">Kadra medyczna</h2>
        <div class="row justify-content-center">
            <div class="accordion accordion-flush" id="accordionFlushExample">

                <style>
                    .img-thumbnail {
                        transition: transform 0.3s ease, z-index 0s ease;
                        cursor: pointer;
                        position: relative;
                    }

                    .img-thumbnail:hover {
                        opacity: 0.5;
                    }

                    .image-container {
                        display: grid;
                        grid-template-columns: repeat(4, 1fr);
                        gap: 20px;
                        row-gap: 100px;
                        position: relative;
                    }

                    .image-item {
                        text-align: center;
                        position: relative;
                        transition: transform 0.3s ease, z-index 0s ease;
                    }

                    .name-info, .email-info {
                        display: none;
                        margin-top: 10px;
                        font-size: 14px;
                        color: #555;
                    }

                    .name-always {
                        margin-top: 10px;
                        font-size: 14px;
                        color: #555;
                        display: block;
                    }

                    .image-item.active .name-always {
                        display: none;
                    }

                    .email-info {
                        display: none;
                    }

                    .image-item.active {
                        z-index: 10;
                        transform: scale(1.7);
                        grid-column: 1 / span 4;
                        grid-row: 1;
                        display: flex;
                        margin-left: 29%;
                    }

                    .image-item.active .img-thumbnail {
                        opacity: 1;
                    }

                    .image-item.active .text-container {
                        margin-left: 20px;
                        display: block;
                        text-align: left;
                    }

                    .image-item.active .name-info,
                    .image-item.active .email-info {
                        display: block;
                    }

                    .label {
                        font-weight: bold;
                    }

                </style>
                
                <script>
                    function toggleImage(id) {
                        var imageItems = document.querySelectorAll('.image-item');
                        var clickedItem = document.getElementById('image-item-' + id);
                
                        imageItems.forEach(function(item) {
                            item.classList.remove('active');
                        });
                
                        clickedItem.classList.add('active');
                        
                        clickedItem.scrollIntoView({behavior: 'smooth', block: 'center'});
                    }
                </script>
                
                <div class="image-container">
                    @foreach ($users as $user)
                        @if($user->image)
                            <div class="image-item" id="image-item-{{ $user->id }}">
                                <div class="bg-image hover-overlay shadow-1-strong rounded" data-mdb-ripple-init data-mdb-ripple-color="light">
                                    <img src="{{ asset('storage/pictures/' . $user->image) }}" alt="image" style="max-width: 100%; height: auto;" class="img-thumbnail" onclick="toggleImage({{ $user->id }})">
                                </div>

                                <div class="text-container">
                                    <div class="name-info">
                                        <span class="label">Imię i nazwisko:</span> {{ $user->name }}
                                    </div>
                                    <div class="name-always">{{ $user->name }}</div>
                                    <div class="email-info">
                                        <span class="label">E-mail:</span> {{ $user->email }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

