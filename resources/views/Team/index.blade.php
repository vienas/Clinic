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
                        text-align: left;
                        position: relative;
                        transition: transform 0.3s ease, z-index 0s ease;
                    }

                    .name-info, .email-info, .about-info {
                        display: none;
                        margin-top: 10px;
                        font-size: 14px;
                        color: #555;
                    }

                    .about {
                        display: none;
                        margin-top: 20px;
                        font-size: 9px;
                        color: #009220;
                    }

                    .name-always {
                        margin-top: 10px;
                        font-size: 14px;
                        color: #555;
                        display: block;
                    }

                    .image-item.active {
                        z-index: 10;
                        transform: scale(1.4);
                        grid-column: 1 / span 4;
                        grid-row: 1;
                        display: grid;
                        grid-template-columns: auto 1fr;
                        margin-left: 24%;
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
                    .image-item.active .email-info,
                    .image-item.active .about-info,
                    .image-item.active .about {
                        display: block;
                    }

                    .label {
                        font-weight: bold;
                    }

                    .comment-info {
                        bottom: 1%;
                        width: 70%;
                        margin-bottom: 2rem;
                        text-align: left;
                    }

                    .separator {
                        width: 100%;
                        height: 2px;
                        background-color: #ccc;
                        margin: 20px 0;
                    }

                    .central {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                </style>

                <script>
                    function toggleImage(id) {
                        var imageItems = document.querySelectorAll('.image-item');
                        var clickedItem = document.getElementById('image-item-' + id);
                        imageItems.forEach(function(item) {
                            item.classList.remove('active');
                            item.querySelector('.about').style.display = 'none';
                            item.querySelector('.name-always').style.display = 'block';
                        });
                        clickedItem.classList.add('active');
                        clickedItem.querySelector('.about').style.display = 'block';
                        clickedItem.querySelector('.name-always').style.display = 'none';
                        clickedItem.scrollIntoView({behavior: 'smooth', block: 'center'});
                    }
                </script>

                <div class="image-container">
                    @foreach ($users as $user)
                        <div class="image-item" id="image-item-{{ $user->id }}">
                            <div class="bg-image hover-overlay shadow-1-strong rounded" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="{{ asset('storage/pictures/' . $user->image) }}" alt="image" style="max-width: 100%; height: auto;" class="img-thumbnail" onclick="toggleImage({{ $user->id }})">
                            </div>

                            <div class="text-container">
                                <div class="name-info">
                                    <span class="label">Imię i nazwisko:</span> {{ $user->name }}
                                </div>
                                <div class="name-always">{{ $user->name }}</div>
                                
                                <div class="about" style="bottom: 5; width: 100%; margin-bottom: 10px;">
                                    <a href="{{ route('team.edit', ['id' => $user->id]) }}" class="btn btn-primary">Więcej o mnie</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="separator"></div>
                <div class="central">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
