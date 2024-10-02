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

                    .comment-info {
                        display: none;
                        margin-top: 20px;
                        font-size: 9px;
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

                    .image-item.active {
                        z-index: 10;
                        transform: scale(1.7);
                        grid-column: 1 / span 4;
                        grid-row: 1;
                        display: grid;
                        grid-template-columns: auto 1fr;
                        margin-left: 26%;
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
                    .image-item.active .comment-info {
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

                    .toggle-comments {
                        background-color: #16927d;
                        color: white;
                        padding: 4px 8px;
                        border: none;
                        cursor: pointer;
                        border-radius: 8px;
                        box-shadow: 0 4px 6px rgba(61, 151, 109, 0.1);
                        transition: background-color 0.3s ease, box-shadow 0.3s ease;
                    }

                    .toggle-comments2 {
                        background-color: #9b8b00;
                        color: rgb(255, 255, 255);
                        padding: 4px 8px;
                        border: none;
                        cursor: pointer;
                        border-radius: 8px;
                        box-shadow: 0 4px 6px rgba(61, 151, 109, 0.1);
                        transition: background-color 0.3s ease, box-shadow 0.3s ease;
                    }

                    .toggle-comments:hover {
                        background-color: #6af8ac;
                        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
                    }

                    .toggle-comments2:hover {
                        background-color: #f0e43c;
                        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
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

                    function toggleComments(button, userId, isAddingComment) {
                        const commentSection = document.getElementById('comment-section-' + userId);
                        const existingComments = document.getElementById('existing-comments-' + userId);
                        const addCommentForm = document.getElementById('add-comment-form-' + userId);
                        document.getElementById('user_id_' + userId).setAttribute("value", userId);
                        // console.log(userId);
                        if (commentSection.style.display === 'none') {
                            commentSection.style.display = 'block';
                        }

                        if (isAddingComment) {
                            existingComments.style.display = 'none';
                            addCommentForm.style.display = 'block';
                        } else {
                            existingComments.style.display = 'block';
                            addCommentForm.style.display = 'none';
                        }
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
                    <div class="email-info">
                        <span class="label">E-mail:</span> {{ $user->email }}
                    </div>
                    <div class="about-info" style="margin-right: 12rem;">
                        <span class="label">O mnie:</span> {{ $user->about }}
                    </div>

                    <div class="comment-info" style="bottom: 0; width: 100%; margin-bottom: 10px;">
                        <button class="toggle-comments" onclick="toggleComments(this, {{ $user->id }}, false)">Komentarze</button>
                        <button class="toggle-comments2" onclick="toggleComments(this, {{ $user->id }}, true)">Dodaj komentarz</button>

                        <div class="comment-section" id="comment-section-{{ $user->id }}" style="display: none; margin-right: 12rem; background-color: #f6fff6; padding: 10px; border-radius: 8px;">
                            @php $notincludepost = true; @endphp
                            
                            <div class="existing-comments" id="existing-comments-{{ $user->id }}">
                                @foreach ($posts as $post)
                                    @if ($post->user_id === $user->id)
                                        @php $notincludepost = false; @endphp
                                        <div>
                                            <span class="label">{{ $post->author_name ?? 'Anonim' }}:</span>
                                            <p>{{ $post->body }}</p>
                                        </div>
                                    @endif
                                @endforeach

                                @if ($notincludepost)
                                    <div><span class="label">Brak komentarzy</span></div>
                                @endif
                            </div>

                            <div class="add-comment-form" id="add-comment-form-{{ $user->id }}" style="display: none;">
                                <form action="{{ route('team.store') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <input class="comments-input" placeholder="Imię i Nazwisko" id="author" name="author" type="text">
                                    </div>

                                    <div class="form-floating">
                                        <textarea class="w-100 comments-input" placeholder="Komentarz" id="comment" name="comment" type="text"></textarea>
                                    </div>
                                    <button type="submit">Zapisz</button>
                                    <input type="hidden" name="user_id" id="user_id_{{ $user->id }}" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
