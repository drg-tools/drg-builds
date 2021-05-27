<div class="mb-4">
    <div class="flex flex-row">
        <div class="mt-1 relative rounded-md shadow-sm flex flex-col w-1/2 mr-4">
            <label for="choices-multiple-characters">Loadout Name</label>
            <div class="absolute inset-y-12 left-0 pl-3 flex items-center pointer-events-none">
                <!-- Heroicon name: solid/mail -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="search" value="{{ \Request::get('search') }}" name="search"
                class="focus:ring-gray-500 focus:border-gray-500 block pl-10 sm:text-sm border-gray-300 text-gray-900"
                placeholder="Search by Loadout Name">
        </div>
        <div class="w-1/4 flex flex-col">
            <label for="characters" class="mb-2.5 text-gray-300">Characters</label>
            <select class="form-control" data-trigger name="characters[]" id="characters"
                placeholder="Select Characters" multiple>
                <option value="">Characters</option>
                <option value="Driller">Driller</option>
                <option value="Engineer">Engineer</option>
                <option value="Gunner">Gunner</option>
                <option value="Scout">Scout</option>
            </select>
        </div>
    </div>

    <div class="my-2 flex sm:flex-row flex-wrap">
        <div class="w-1/6 mr-3">
            <label class="block">
                <span class="text-gray-300">Overclocks?</span>
                <select class=" mt-1 block w-full text-gray-800" name="overclocks" id="overclocks">
                    <option value="">Select Option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </label>
        </div>
        <div class="w-1/6 mr-3">
            <label class="block">
                <span class="text-gray-300">Loadout Guide?</span>
                <select class="form-select mt-1 block w-full text-gray-800" name="guide" id="guide">
                    <option value="">Select Option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </label>
        </div>
    </div>
    <div class="flex flex-row">
        <div class="w-2/6 mr-3">
            <label for="primaries" class="text-gray-300">Primaries</label>
            <select class="form-control" name="primaries[]" id="primaries" placeholder="Select Primary Weapons"
                multiple>
                <option value="">Primaries</option>
                @foreach ($primaries as $weapon)
                    <option value="{{ $weapon->id }}">{{ $weapon->name }}</option>
                @endforeach
            </select>


        </div>
        <div class="w-2/6 mr-3">
            <label for="secondaries" class="text-gray-300">Secondaries</label>
            <select class="form-control" name="secondaries[]" id="secondaries" placeholder="Select Secondary Weapons"
                multiple>
                <option value="">Secondaries</option>
                @foreach ($secondaries as $gun)
                    <option value="{{ $gun->id }}">{{ $gun->name }}</option>
                @endforeach
            </select>

        </div>
        <button class="ml-2 mt-7 px-6 py-1 bg-karl-orange text-gray-800 text-center font-bold sm:rounded max-h-10"
            type="submit">
            Submit
        </button>
    </div>
</div>

@section('scripts')
<script type="text/javascript">
    
    document.addEventListener('DOMContentLoaded', function() {

        
        var primarySelectMultiple = new Choices(
        '#primaries',
        {
            removeItemButton: true,
        }
        );
        var secondarySelectMultiple = new Choices(
        '#secondaries',
        {
            removeItemButton: true,
        }
        );
        var characterSelectMultiple = new Choices(
            '#characters',
        );
        var overclocksSelectSingle = new Choices(
            '#overclocks',
            {
                searchEnabled: false,
            }
        );
        var guideSelectSingle = new Choices(
            '#guide',
            {
                searchEnabled: false,
            }
        );
        @if( request()->get('characters') )  
            characterSelectMultiple.setChoiceByValue({!! json_encode(request()->get('characters'))!!});
        @endif
        @if( request()->get('overclocks') )  
            overclocksSelectSingle.setChoiceByValue({!! json_encode(request()->get('overclocks'))!!});
        @endif
        @if( request()->get('guide') )  
            guideSelectSingle.setChoiceByValue({!! json_encode(request()->get('guide'))!!});
        @endif
        @if( request()->get('primaries') )  
            primarySelectMultiple.setChoiceByValue({!! json_encode(request()->get('primaries'))!!});
        @endif
        @if( request()->get('secondaries') )  
            secondarySelectMultiple.setChoiceByValue({!! json_encode(request()->get('secondaries'))!!});
        @endif
    });
    </script>

@endsection
