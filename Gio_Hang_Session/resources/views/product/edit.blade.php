@extends('product/home')

@section('title', 'Cập nhật Sản phẩm')


@section('content')

  <div class="row">

      <div class="col-md-12">

          <h2>Cập nhật Sản phẩm</h2>

      </div>

      <div class="col-md-12">

          <form method="post" action="" enctype="multipart/form-data">

              @csrf

              <div class="form-group">

                  <label>Tên sản phẩm</label>

                  <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>

              </div>
              <div class="form-group">

                  <label>Ghi chú</label>

                  <input type="text" class="form-control" name="description" value="{{ $product->description }}" required>

              </div>

             <div class="form-group">

                  <label>Giá</label>

                  <input type="text" class="form-control" name="price" value="{{ $product->price }}" required>

              </div>

              <div class="form-group">

                  <label>Ảnh</label>

                  <input type="file" name="picture" class="form-control-file" >

              </div>
              


              <button type="submit" class="btn btn-primary">Chỉnh sửa</button>

              <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

          </form>

      </div>

  </div>


@endsection