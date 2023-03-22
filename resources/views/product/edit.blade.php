<x-layout>
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('products.update', $product) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input id="name" name="code" value="{{ $product->code }}" type="hidden"
                            class="form-control">
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name" name="name" value="{{ $product->name }}" type="text"
                            class="form-control">
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input value="{{ $product->price }}" name="price" type="number" class="form-control"
                            id="price">
                        @error('price')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <button data-bs-dismiss="modal" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
