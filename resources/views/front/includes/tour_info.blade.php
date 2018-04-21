<div class="tour-info">
    <h2>{{$tour->name}}</h2>
    @if(isset($tour->photos[0]))
        <img width="300" src="{{ asset('storage/' . $tour->photos[0]->filename ) }}">
    @else
        <img src="holder.js/370x220">
    @endif
    <p>{!!$tour->summary!!}</p>
</div>