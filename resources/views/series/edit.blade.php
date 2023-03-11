<x-master title="Edit Series">
    <div class="container d-flex flex-column align-items-center text-start my-5 py-5 shadow rounded">

        <div class="row col-6">
            <form action="{{ route('series.update', $props['data']['series']->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="form-group mb-3">
                        <label for="name form-label">Name</label>
                        <input class="form-control" 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name') != '' ? old('name') : $props['data']['series']->name }}" 
                            required 
                            autofocus>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mb-3 col-6">
                        <label for="seasons" class="form-label">Seasons</label>
                        <input class="form-control" 
                            type="number" 
                            id="seasons" 
                            name="seasons" 
                            value="{{ old('seasons') != '' ? old('seasons') : $props['data']['series']->seasons->count() }}"
                            required>
                    </div>

                    <div class="form-group mb-3 col-6">
                        <label for="episodes" class="form-label">Episodes</label>
                        <input class="form-control" 
                            type="number" 
                            id="episodes" 
                            name="episodes" 
                            value="{{ old('episodes') != '' ? old('episodes') : $props['data']['series']->episodesPerSeason->count() }}"
                            required>
                    </div>
                </div>

                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
            </form>
        </div>

        <x-form.alert/>

    </div>
</x-master>