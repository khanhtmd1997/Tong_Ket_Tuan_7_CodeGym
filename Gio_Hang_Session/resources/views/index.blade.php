@extends('master')
@section('content')
    <div class="title m-b-md">
        Danh sách sản phẩm
    </div>

    <div class="row">
        @if(!isset($products) || count($products) === 0)
            <p class="text-danger">Không có sản phẩn nào.</p>
        @else

            <!-- Nếu biến $products tồn tại thì hiển thị sản phẩm -->
            @foreach($products as $key => $product)
                <div class="col-4">
                    <div class="card text-left" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text text-dark">${{ $product->price }}</p>
                            <p><img src="{{ asset('storage/'.$product->picture) }}" width="40" height="auto"></p>
                            <p class="card-text text-danger">Số lượt xem: {{ $product->view_count }}</p>

                            <!-- Nút XEM chuyển hướng người dùng sang trang chi tiết -->
                            <a href="{{ route('show', $product->id) }}" class="btn btn-primary">Xem</a>
                        </div>
                    </div>
                </div>

            @endforeach
        @endif
    </div>
@endsection