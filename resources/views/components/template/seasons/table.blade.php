<table class="table table-light table-bordered table-striped table-hover caption-top">
    <caption>{{ $name }}'s Seasons</caption>
    <thead class="table-dark">
        <tr>
            <th>Season Number</th>
            <th>Episodes Per Season</th>
            <th>Watched</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($seasons as $season)
            <tr>
                <th> <a href="{{ route('series.seasons.episodes.index', ['series' => $series->id, 'season' => $season->id]) }}">Season {{ $season->number }}</a> </th>
                <td>{{ $season->episodes->count() }}</td>
                <td>{{ 0 }} / {{ $season->episodes->count() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
