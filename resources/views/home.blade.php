<x-layout>
    <x-slot:title>
        PokeNick
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        @forelse ($nicknames as $nickname)
            
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <div>
                    <div class="font-semibold">{{ $nickname->user ? $nickname->user->name : 'Anonymous' }}</div>
                    <div class="mt-1">{{ $nickname -> name }}</div> 
                    <div class ="text-sm text-gray-500 mt-2">{{ $nickname->created_at->diffForHumans() }}</div>
                </div>
            </div>
        </div>
        @empty
            <p class="text-gray-500">No pokemons yet. Be the first one to add pokemon! </p>
        @endforelse
    </div>
</x-layout>