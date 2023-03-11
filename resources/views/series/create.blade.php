<x-master title="{{ $props['title'] }}">
    <div class="container d-flex flex-column align-items-center text-start my-5 py-5 shadow rounded">

        <div class="row col-6">
            <form action="{{ route('series.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name') }}"
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
                            value="{{ old('seasons') }}"
                            required>
                    </div>

                    <div class="form-group mb-3 col-6">
                        <label for="episodes" class="form-label">Episodes</label>
                        <input class="form-control" 
                            type="number" 
                            id="episodes" 
                            name="episodes" 
                            value="{{ old('episodes') }}"
                            required>
                    </div>
                </div>

                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
            </form>
        </div>

        <x-form.alert/>

    </div>
</x-master>