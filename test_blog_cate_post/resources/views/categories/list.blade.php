@extends('categories/home')
@section('title', 'Danh sách danh mục')
@section('content')
  <div class="col-12">
      <div class="row">
          <div class="col-12">
              <h1>Danh Sách danh mục</h1>
          </div>
          <table class="table table-striped">
              <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên danh mục</th>
                  <th scope="col">Tiêu đề</th>
                  <th></th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @if(count($categories) == 0)
                  <tr>
                      <td colspan="4">Không có dữ liệu</td>
                  </tr>
              @else
                  @foreach($categories as $key => $category)
                      <tr>
                          <th scope="row">{{ ++$key }}</th>
                          <td>{{ $category->name }}</td>
                          <td>{{ count($category->posts) }}</td>
                          <td><a href="{{ route('categories.edit',$category->id)}}">sửa</a></td>
                          <td><a href="{{ route('categories.destroy',$category->id)}}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                      </tr>
                  @endforeach
              @endif
              </tbody>
          </table>
          <a class="btn btn-primary" href="{{ route('categories.create')}}">Thêm mới</a>
           <!-- <a class="btn btn-primary" href="{{ route('categories.create')}}">Thêm mới</a> -->
      </div>
  </div>
@endsection