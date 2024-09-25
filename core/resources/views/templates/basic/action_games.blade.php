@extends($activeTemplate . 'layouts.frontend')
@section('content')

    <section class="pt-120 pb-120 section--bg">
        <div class="container">
            <div class="row justify-content-center mb-none-30">
                @foreach ($action_games as $game)
                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-30 col-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                        <a href="{{ route('user.play.ActionGame', $game->alias) }}" class="game-card d-block">
                            <div class="game-card__thumb">
                                <img src="{{ getImage(getFilePath('game') . '/action_game/' . $game->image, getFileSize('game')) }}" alt="image">
                            </div>
                            <div class="game-card__content">
                                <h4 class="game-name">{{ __($game->name) }}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

{{--    @if ($sections->secs != null)--}}
{{--        @foreach (json_decode($sections->secs) as $sec)--}}
{{--            @include($activeTemplate . 'sections.' . $sec)--}}
{{--        @endforeach--}}
{{--    @endif--}}
@endsection
