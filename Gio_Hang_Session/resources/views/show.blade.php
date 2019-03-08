@extends('master')
@section('content')
    <div class="title m-b-md">
        Chi tiết sản phẩm
    </div>

    <div class="row">

        <!-- Kiểm tra biến $product được truyền sang từ ProductController -->
        <!-- Nếu biến $products không tồn tại thì hiển thị thông báo -->
        @if(!isset($product))
            <p class="text-danger">Không có sản phẩn nào.</p>
        @else

            <!-- Nếu biến $product tồn tại thì hiển thị sản phẩm -->
            <form method="get" action="{{ route('showBuy', $product->id) }}">
                <div class="col-md-12">
                    <div class="card text-left" style="width: 150%;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text text-dark">${{ $product->price }}</p>
                            <p><img src="{{ asset('storage/'.$product->picture) }}" width="40" height="auto"></p>
                            <p class="card-text text-danger">Số lượt xem: {{ $product->view_count }}</p>
                            <button type="submit" class="btn btn-primary">Mua Ngay</button>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                            <!-- Nút XEM chuyển hướng người dùng quay lại trang danh sách sản phẩm -->
                            <a href="{{ route('index') }}" class="btn btn-primary">< Quay lại </a>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection