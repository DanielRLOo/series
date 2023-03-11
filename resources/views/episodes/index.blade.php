<x-master title="Episodes">
    <div class="container d-flex justify-content-center">
        <x-template.episodes.table 
            :episodes="$props['data']['episodes']"/>
    </div>
</x-master>