<form wire:submit.prevent="submit">
    <div class="form-group">
      <label for="name">Nombre</label>
      <input id="name" type="text" class="form-control" wire:model="name" placeholder="Nombre">
      @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
      <label for="price">Precio</label>
      <input wire:model="price" type="number" class="form-control" id="price" placeholder="Precio">
      @error('price') <span class="error">{{ $message }}</span> @enderror
    </div>
    <button data-bs-dismiss="modal" type="submit" class="btn btn-primary">Submit</button>
  </form>