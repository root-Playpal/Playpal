@extends($activeTemplate . 'layouts.master')
@section('content')
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 class="f-size--28 mb-4 text-center">@lang('Play the Game')</h3>
                    <button id="openGame" class="cmn-btn">@lang('Play Game')</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional: Include any additional content or instructions here -->

@endsection

@push('script')
    <script>
        "use strict";

        document.getElementById('openGame').addEventListener('click', function() {
            var url = '{{ url('/assets/custom_games/fruits_slots/game/index.html') }}';

            var width = screen.width;
            var height = screen.height;
            var left = 0;
            var top = 0;

            // Open a new window with fullscreen dimensions
            window.open(url, '_blank', 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top + ',fullscreen=yes');
        });
    </script>
@endpush
