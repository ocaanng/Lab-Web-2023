@extends('layouts.main')
@section('container')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card p-4 mt-5">
                <h3>Edit Product</h3>
                <form method="POST" action="/product/{{ $product->id }}/update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Barang :</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama', $product->nama) }}"
                            placeholder="Masukkan nama barang">
                        @if ($errors->has('nama'))
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Harga Barang :</label>
                        <input type="text" class="form-control" name="harga"
                            value="{{ old('harga', $product->harga) }}" placeholder="Masukkan harga barang">
                        @if ($errors->has('harga'))
                            <span class="text-danger">{{ $errors->first('harga') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Jenis :</label>
                        <select class="form-select" name="jenis">
                            <option>{{ $product->jenis }}</option>
                            <option value="Baju Kaos">Baju Kaos</option>
                            <option value="Kemeja">Kemeja</option>
                            <option value="Celana Panjang">Celana Panjang</option>
                            <option value="Celana Pendek">Celana Pendek</option>
                            <option value="Hoodie">Hoodie</option>
                            <option value="Jacket">Jacket</option>
                            <option value="Sweater">Sweater</option>
                            <option value="Handphone">Handphone</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Sepatu">Sepatu</option>
                        </select>
                        @if ($errors->has('jenis'))
                            <span class="text-danger">{{ $errors->first('jenis') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Deskripsi :</label>
                        <textarea class="form-control" rows="4" name="deskripsi" placeholder="Masukkan deskripsi barang">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                        @if ($errors->has('deskripsi'))
                            <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Gambar Barang :</label>
                        <input type="file" class="form-control" name="image" placeholder="Masukkan gambar barang">
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-dark mt-4">Add Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
