@extends('layouts.app')

@section('content')

<section class="page-section portfolio" id="portfolio">
    <div class="container mb-2">

        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close text-success" data-bs-dismiss="alert" aria-label="close">
                <span aria-hidden="true"></span>
            </button>
        </div>
        @endif

        <h2 class="masthead page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top: 5rem;">
            {{ $users->name }}
        </h2>
        <div class="row justify-content-center">
            <div class="accordion accordion-flush" id="accordionFlushExample">

                <style>
                    .name-info, .email-info, .about-info {
                        display: block;
                        margin-top: 10px;
                        font-size: 25px;
                        color: #555;
                    }
                    .comment-info {
                        bottom: 1%;
                        width: 115%;
                        margin-bottom: 2rem;
                        text-align: left;
                    }
                </style>

                <div style="display: flex; align-items: flex-start; margin-bottom: 20px;">
                    <div style="flex-shrink: 0; margin-right: 20px;">
                        <img src="{{ asset('storage/pictures/' . $users->image) }}" style="width: 300px; height: auto; max-width: 100%; max-height: 400px;">
                    </div>


                    <div class="text-container">
                        <div class="email-info">
                            <span class="label"><strong>E-mail:</strong></span> {{ $users->email }}
                        </div>
                        <div class="about-info">
                            <span class="label"><strong>O mnie:</strong></span> {{ $users->about }}
                        </div>
                    </div>
                </div>

                <div class="comment-info" style="margin-bottom: 10px;">
                    <div class="comment-section" id="comment-section-{{ $users->id }}" style="margin-right: 12rem; background-color: #f6fff6; padding: 10px; border-radius: 8px;">
                        
                        <h3 class="text-center">Komentarze</h3>

                        <div class="existing-comments" id="existing-comments-{{ $users->id }}">
                            @php
                            $usersPosts = $users->posts()->orderBy('created_at', 'desc')->paginate(4);
                            @endphp

                            @if ($usersPosts->isEmpty())
                                <div>
                                    <span class="label">Brak komentarzy</span>
                                </div>
                            @else
                                @foreach ($usersPosts as $post)
                                    <div>
                                        <span class="label"><strong>{{ $post->author_name ?? 'Anonim' }}:</strong></span>
                                        <p>{{ $post->body }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="pagination">
                            {{ $usersPosts->links() }}
                        </div>

                        <div class="add-comment-form" id="add-comment-form-{{ $users->id }}" style="display: block;">
                            <form action="{{ route('team.store') }}" method="POST">
                                @csrf
                                <div class="form-floating">
                                    <input class="comments-input" placeholder="Imię i Nazwisko" id="author" name="author" type="text" required>
                                </div>

                                <div class="form-floating">
                                    <textarea class="w-100 comments-input" placeholder="Komentarz" id="comment" name="comment" required></textarea>
                                </div>

                                <button type="submit">Dodaj komentarz</button>
                                <input type="hidden" name="user_id" id="user_id_{{ $users->id }}" value="{{ $users->id }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
