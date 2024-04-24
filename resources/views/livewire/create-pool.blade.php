<div>
    <form>
      <label>Poll Title</label>
  
      <input type="text" wire:model.live="title" /> {{-- wire:model.live makes the model title(passed from CreatePool class) dynamiclly updating without page refreshing or using of JavaScript --}}
                                                    {{-- this wire:model.live its not part of html itt part of livewire sentacs the handel spetially on the client side--}}
                                                    {{-- and this means to ask livewire to synchronize the value of title property (of CreatePool component class) on the server --}}
                                                    {{-- so the livewire makes requests to the server to re render the view (of CreatePool component class) each time the title is updating on the client side --}}
                                                    {{-- then the javaScript (included in the livewire) making a smart update to the html of the view, and compare the part that changed with the old one, and it only update the new relevent part in a smart way --}}

        Current title: {{ $title }} {{-- $title is a property that passed from the CreatePool Class --}}
    </form>
</div>
