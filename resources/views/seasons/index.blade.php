<x-master title="Seasons">
    <div class="container shadow rounded p-3">
        <x-template.seasons.table 
            :name="$props['table_caption']" 
            :seasons="$props['data']['seasons']"
            :series="$props['data']['series']"/>
    </div>
</x-master>
