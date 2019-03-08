@extends('product/home')
@section('title', 'Danh sách sản phẩm')
@section('content')
  <div class="col-12">
      <div class="row">
          <div class="col-12">
              <h1>Danh Sách sản phẩm</h1>
          </div>
          <a class="btn btn-primary" href="{{ route('show', $product->id) }}">Trang chủ</a>
          <div class="col-12">
           @if (Session::has('success'))
                        <p class="text-success">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            {{ Session::get('success') }}
                        </p>
            @endif

          </div>
          <table class="table table-striped">
              <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Ghi chú</th>
                  <th scope="col">Giá</th>
                  <th scope="col">Ảnh</th>
                  <th scope="col">Lượt xem</th>
                  <th></th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @if(count($products) == 0)
                  <tr>
                      <td colspan="4">Không có dữ liệu</td>
                  </tr>
              @else
                  @foreach($products as $key => $product)
                      <tr>
                          <th scope="row">{{ $product->id }}</th>
                          <td>{{ $product->name }}</td>
                          <td>{{ $product->description }}</td>
                          <td>{{ $product->price }}</td>
                          <td><img src="{{ asset('storage/'.$product->picture) }}" width="40" height="auto"></td>
                          <td>{{ $product->view_count }}</td>
                          <td><a href="{{ route('product.edit', $product->id)}}">sửa</a></td>
                          <td><a href="{{ route('product.destroy', $product->id)}}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                      </tr>
                  @endforeach
              @endif
              </tbody>
          </table>
          <a class="btn btn-primary" href="{{ route('product.create')}}">Thêm mới</a>

          {{ $products->links()}}
      </div>
  </div>
@endsection