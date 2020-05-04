
<div>
    <p class="font-bold">Select a Character</p>
    <div class="grid grid-cols-4 gap-4 mt-4">
        @foreach($characters as $character)
            <div wire:click="$set('character_id', {{ $character->id }})" wire:key="{{ $character->id }}"
                 class="p-4 bg-gray-200 text-center cursor-pointer hover:bg-blue-100 border-2 select-none {{ $character->id == $character_id ? "bg-blue-100 border-blue-400" : "" }}">
                <x-character-icon name="{{ $character->name }}" size="10"/>
                <br>
                <p class="text-sm leading-5 text-gray-900 font-bold">{{ $character->name }}</p>
            </div>
        @endforeach
    </div>

    <input type="hidden" name="character_id" value="{{ $character_id }}">

    @if($this->selectedCharacter)
        @if($build)
        @livewire('gun-selector', ['guns' => $this->selectedCharacter->guns, 'selected' => $build->mods->each->gun->pluck('gun.id','gun.character_slot')->all() ?? [], 'build' => $build ?? null], key($this->selectedCharacter->id))
        @else
        @livewire('gun-selector', ['guns' => $this->selectedCharacter->guns], key($this->selectedCharacter->id))
        @endif
    @endif
</div>
