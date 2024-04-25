<div>
    <form wire:submit.prevent="createPoll">
        <label>Poll Title</label>
  
        <input type="text" wire:model.live="title" /> {{-- wire:model.live makes the model title(passed from CreatePoll class) dynamiclly updating without page refreshing or using of JavaScript by ourself --}}
                                                    {{-- this wire:model.live its not part of html itt part of livewire sentacs the handel spetially on the client side--}}
                                                    {{-- and this means to ask livewire to synchronize the value of title property (of CreatePoll component class) on the server --}}
                                                    {{-- so the livewire makes requests to the server to re render the view (of CreatePoll component class) each time the title is updating on the client side --}}
                                                    {{-- then the javaScript (included in the livewire) making a smart update to the html of the view, and compare the part that changed with the old one, and it only update the new relevent part in a smart way --}}
        
        @error('title') {{-- the title that passed from CreatePoll Class --}}
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="mb-4 mt-4">
            <button class="btn" wire:click.prevent="addOption">Add Option</button> {{-- click.prevent will prevent the html behavior from submit the form with each click, insted call this livewire action (addOption) from the component class --}}
        </div>
        
      
        <div>
            @foreach ($options as $index => $option)
            <div class="mb-4">
                <label>Option {{ $index + 1 }}</label>
                <div class="flex gap-2">
                    <input type="text" wire:model="options.{{ $index }}" /> {{-- to make the options.{{ $index }} (each index of the options array) wired --}}
                    <button class="btn"
                        wire:click.prevent="removeOption({{ $index }})">Remove</button> {{-- prevent the submit and call the removeOption action with $indix paramiter from the CreatePoll class --}}
                </div>

                @error("options.{$index}") {{-- to each option element in options array passed from the CreatePoll Class --}}
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            @endforeach
        </div>
        
        <button type="submit" class="btn">Create Poll</button>
    </form>
</div>