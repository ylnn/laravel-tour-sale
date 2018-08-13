<div class="tour-info">
    <h2>{{$tour->name}}</h2>

    @if ('tour' === \Request::route()->getName())
        <ul id="lightSlider">
        @forelse ($tour->photos as $photo)
                <li>
                    <img src="{{ asset('storage/' . $photo->filename ) }}">
                </li>
            @empty
                <li>
                    <img src="holder.js/325x200"> 
                </li>
            @endforelse
        </ul>

    <div class="summary">{!!$tour->summary!!}</div>
    @endif
</div>