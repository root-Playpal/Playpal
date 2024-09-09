@extends($activeTemplate . 'layouts.master')
@section('content')

    @push('style-lib')
        <link href="http://xaxino.test/assets/global/css/custom_css/investment-group.css" rel="stylesheet">
    @endpush

    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body h-100 middle-el">
                        <div class="alt"></div>
                        <div class="game-details-left">
                            <div class="game-details-left__body">
                                <div class="flp">
                                    <div id="coin-flip-cont">
                                        <div class="flipcoin" id="coin">
                                            <div class="flpng coins-wrapper">
                                                <div class="front"><img src="{{ asset($activeTemplateTrue . 'images/play/head.png') }}" alt=""></div>
                                                <div class="back"><img src="{{ asset($activeTemplateTrue . 'images/play/tail.png') }}" alt=""></div>
                                            </div>
                                            <div class="headCoin d-none">
                                                <div class="front"><img src="{{ asset($activeTemplateTrue . 'images/play/head.png') }}" alt=""></div>
                                                <div class="back"><img src="{{ asset($activeTemplateTrue . 'images/play/tail.png') }}" alt=""></div>
                                            </div>
                                            <div class="tailCoin d-none">
                                                <div class="front"><img src="{{ asset($activeTemplateTrue . 'images/play/tail.png') }}" alt=""></div>
                                                <div class="back"><img src="{{ asset($activeTemplateTrue . 'images/play/head.png') }}" alt=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cd-ft"></div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5">
                    <div class="game-details-right">
                        <form id="game" method="post">
                            @csrf
                            <?php
                            $lastWin = \App\Models\GameLog::where('user_id', auth()->id())
                                ->where('game_id', '=', $game->id)
                                ->where('win_status', '!=', 0)
                                ->where('win_amo', '>', 0)
                                ->latest('id')
                                ->first();
                            $_SESSION['lastWinSession'] = $lastWin->win_amo;
                            ?>
                            <h3 class="f-size--28 mb-4 text-center text-white">
                                @lang('Last Win :')
                                {{--                                <span class="base--color">--}}
                                {{--                                <span class="bal text-white">--}}
                                {{ showAmount($_SESSION['lastWinSession'] ?? 0, currencyFormat: false) }}
                                {{--                                </span>--}}
                                {{ __(gs('cur_text')) }}
                                {{--                                </span>--}}
                            </h3>

                            <h5 class="f-size--28 mb-4 text-left">@lang('Current Balance :') <span class="base--color">
                                    <span class="bal">{{ showAmount(auth()->user()->balance, currencyFormat: false) }}</span> {{ __(gs('cur_text')) }}</span>
                            </h5>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="d-flex justify-content-center">
                                            <swiper-container class="mySwiper form-check checkbox-group" navigation="true">
                                                <swiper-slide>
                                                    <input type="radio" style="display: none" name="invest" id="amount010" value="0.10" class="checkbox-input" {{ old('invest') == '0.10' ? 'checked' : '' }}>
                                                    <x-label class="checkbox-label" for="amount010">0.10</x-label>

                                                    <input type="radio" style="display: none" name="invest" id="amount020" value="0.20" class="checkbox-input" {{ old('invest') == '0.20' ? 'checked' : '' }}>
                                                    <x-label class="checkbox-label" for="amount020">0.20</x-label>

                                                    <input type="radio" style="display: none" name="invest" id="amount050" value="0.50" class="checkbox-input" {{ old('invest') == '0.50' ? 'checked' : '' }}>
                                                    <x-label class="checkbox-label" for="amount050">0.50</x-label>

                                                    <input type="radio" style="display: none" name="invest" id="amount1" value="1" class="checkbox-input" {{ old('invest') == '1' ? 'checked' : '' }}>
                                                    <x-label class="checkbox-label" for="amount1">1</x-label>

                                                </swiper-slide>
                                                <swiper-slide>
                                                    <input type="radio" style="display: none" name="invest" id="amount2" value="2" class="checkbox-input" {{ old('invest') == '2' ? 'checked' : '' }}>
                                                    <x-label class="checkbox-label" for="amount2">2</x-label>

                                                    <input type="radio" style="display: none" name="invest" id="amount5" value="5" class="checkbox-input" {{ old('invest') == '5' ? 'checked' : '' }}>
                                                    <x-label class="checkbox-label" for="amount5">5</x-label>

                                                    <input type="radio" style="display: none" name="invest" id="amount10" value="10" class="checkbox-input" {{ old('invest') == '10' ? 'checked' : '' }}>
                                                    <x-label class="checkbox-label" for="amount10">10</x-label>

                                                    <input type="radio" style="display: none" name="invest" id="amount20" value="20" class="checkbox-input" {{ old('invest') == '20' ? 'checked' : '' }}>
                                                    <x-label class="checkbox-label" for="amount20">20</x-label>
                                                </swiper-slide>
                                            </swiper-container>
                                    </div>
                                </div>
                                <small class="form-text text-muted"><i class="fas fa-info-circle mr-2"></i>
                                    <span class="text--warning">@lang('Win Amount')
                                        @if ($game->invest_back == 1)
                                            {{ getAmount($game->win + 100) }}
                                        @else
                                            {{ getAmount($game->win) }}
                                        @endif %
                                    </span>
                                </small>
                            </div>
                            <div class="form-group justify-content-center d-flex mt-5">
                                <div class="single-select head gmimg">
                                    <img src="{{ asset($activeTemplateTrue . '/images/play/head.png') }}" alt="game-image">
                                </div>
                                <div class="single-select tail gmimg">
                                    <img src="{{ asset($activeTemplateTrue . '/images/play/tail.png') }}" alt="game-image">
                                </div>
                                <input name="choose" type="hidden" value="{{ old('choose') }}">
                            </div>
                            <div class="mt-5 text-center">
                                <button class="cmn-btn w-100 game text-center" id="flip" type="submit">@lang('Play Now')</button>
                                <a class="game-instruction mt-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">@lang('Game Instruction') <i class="las la-info-circle"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content section--bg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('Game Rule')</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @php echo $game->instruction @endphp
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style-lib')
    <link href="{{ asset('assets/global/css/game/coinflipping.min.css') }}" rel="stylesheet">
@endpush

@push('script-lib')
    <script type="text/javascript" src="{{ asset('assets/global/js/game/coin.js') }}"></script>
@endpush

@push('script')
    <script>
        "use strict";
        let audio;

        $('#game').on('submit', function(e) {
            e.preventDefault();
            audio = new Audio(`{{ asset('assets/audio/coin.mp3') }}`);
            audio.play();
            $('.flipcoin').removeClass('animateClick');
            $('.flpng').removeClass('d-none');
            $('#coin .headCoin').addClass('d-none');
            $('#coin .tailCoin').addClass('d-none');
            $('.cmn-btn').html('<i class="la la-gear fa-spin"></i> Processing...');
            $('.cmn-btn').attr('disabled', true);

            var data = $(this).serialize();
            var url = "{{ route('user.play.game.invest', 'head_tail') }}";
            game(data, url);
        });

        function endGame(data) {
            var url = "{{ route('user.play.game.end', 'head_tail') }}";
            audio.pause();
            complete(data, url);

            // Add a slight delay before reloading the page to ensure the result is fetched
            setTimeout(() => {
                window.location.reload();
            }, 2000); // 2-second delay
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
@endpush
