<div class="col-12 col-md-6 col-lg-4 col-xl-3 g-5">
    <div class="card h-100 shadow">
        <img src="https://picsum.photos/id/{{ $series->id }}/200" class="card-img-top" alt="Series cover">
        <div class="card-body">
            <h5 class="card-title">{{ $series->name }}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                of the
                card's content.</p>
                <a href="{{ route('series.seasons.index', ['series' => $series->id, 'series_name' => $series->name]) }}" class="btn btn-success">View</a>
        </div>
        <div class="card-footer d-flex gap-3">
            <a href="{{ route('series.edit', $series->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('series.destroy', $series->id) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" value="{{ $series->id }}">
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </form>
        </div>
    </div>
</div>
