@php
    $content = getContent('game.content', true);
    $games = \App\Models\Game::active()->get();
@endphp
<style>
    .gameCard {
        width: 50vw;
        height: 65vh;
        background-color: #01162f;
        position: relative;
        background-image: url("{{ asset('assets/images/game/61052482a60ed1627726978.jpg') }}");
        background-repeat: no-repeat;
        background-size: 100%;
        background-position: center;
        border-radius: 8px;
        /*border-top-left-radius: 8px;*/
        /*border-top-right-radius: 8px;*/
        transition: 0.5s ease-in-out;
        padding: 0;
        margin-bottom: 4vw;
    }
    .gameCard:nth-child(2){
        background-image: url("{{ asset('assets/images/game/658138687ef751702967400.png') }}");
    }
    .gameCard:nth-child(3){
        background-image: url("{{ asset('assets/images/game/610521608fde21627726176.jpg') }}");
        background-position: center -10px;
    }
    .gameCard .shadow{
        width: 100%;
        height: 100%;
        border-image: fill 0 linear-gradient(#0001, #000);
        /*background-image: linear-gradient(transparent, rgba(0, 0, 0, 0.5) 78%);*/
        border-radius: 8px;
    }
    @media (max-width: 968px) {
        .gameCard {
            width: 90vw;
            height: 30vh;
            margin-bottom: 7vw;
        }
    }
    .gameCard h2{
        text-align: center;
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        /*background: purple;*/
    }
    .gameCard:hover{
        background-size: 105%;
    }
</style>
<section class="pt-120 pb-120 section--bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">{{ __(@$content->data_values->heading) }}</h2>
                    <p class="mt-3">{{ __(@$content->data_values->subheading) }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-none-30">
            <a href="./action_games" class="gameCard">
                <div class="shadow">
                    <h2>Action Games</h2>
                </div>
            </a>

            <a href="./games" class="gameCard">
                <div class="shadow">
                    <h2>Slot Games</h2>
                </div>
            </a>

            <a href="#" class="gameCard">
                <div class="shadow">
                    <h2>Card Games</h2>
                </div>
            </a>
        </div>
    </div>
</section>
