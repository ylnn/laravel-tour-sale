<div class="tour-info">
        <h2>{{$tour->name}}</h2>
        <div class="tourPhotos">
        @forelse ($tour->photos as $photo)
                <div>
                    <img src="{{ asset('storage/' . $photo->filename ) }}">
                </div>
            @empty
                <div>
                    <img src="holder.js/325x200"> 
                </div>
            @endforelse
        </div>

        <div class="summary">{!!$tour->summary!!}</div>
</div>