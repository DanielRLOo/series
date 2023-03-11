<div class="col-12 col-md-6 container shadow rounded">
    <table class="table table-light table-bordered table-striped table-hover caption-top">
        <caption>Episodes</caption>
        <thead class="table-dark">
            <tr>
                <th>Number</th>
                <th>Watched</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($episodes as $episode)
                <tr>
                    <td>{{ $episode->number }}</td>
                    <td><input type="checkbox" name="episodes[]" id="episodes" value="{{ $episode->id }}"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

