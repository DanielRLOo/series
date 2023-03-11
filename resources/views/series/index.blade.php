<x-master title="Series">
    @isset($props['message'])
        <div class="alert alert-{{ $props['message']['type'] }}">
            {{ $props['message']['content'] }}
        </div>
    @endisset
    <div class="container">
        <div class="row">
            @if ($props['data']['series'] != null)
                @foreach ($props['data']['series'] as $series)
                    <x-template.series.card :$series />
                @endforeach
            @endif
        </div>
    </div>
</x-master>
