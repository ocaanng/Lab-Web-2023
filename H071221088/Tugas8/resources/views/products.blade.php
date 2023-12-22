@extends('layouts.main')
@section('container')
    <style>
        label {
            color: #fff
        }

        span {
            color: #fff
        }

        .container1 {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #580ef6;
            width: 650px;
            padding: 1.4rem;
            border-radius: 10px;
            border: 1px solid #f7f7f7;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .container1 {
            margin: 15px 5px;
        }
    </style>
    <div class="row mt-4">
        @foreach ($products as $product)
            <div class="col-md-6 container1">
                <center>
                    <div class="product-card mb-4">
                        <h3><a href="{{ route('show', $product->productName) }}"
                                style="color: #da8ee7">{{ $product->productName }}</a></h3>
                                <center>
                        <table>
                                <form>
                                    <tr>
                                        <td><label for="nama">Product Line</label></td>
                                        <td><span>: {{ $product->productLine }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><label for="nama">Product Vendor</label></td>
                                        <td><span>: {{ $product->productVendor }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><label for="nama">Stock</label></td>
                                        <td><span>: {{ $product->quantityInStock }}</span></td>
                                    </tr>
                                </form>
                            </table>
                        </center>
                    </div>
                </center>
            </div>
        @endforeach
    </div>
@endsection
