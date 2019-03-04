@extends('Tasks/home')
@section('title', 'Danh sách Tasks')
@section('content')
  <a class="btn btn-primary" href="{{ route('tasks.create') }}">Thêm mới</a>
     <div class="col-12">
           <div class="row">
               <div class="col-12"><h1>Danh Sách Tasks</h1></div>
               <div class="col-12">
                   @if (Session::has('success'))
                      <p class="text-success">
                         <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                      </p>
                   @endif
               </div>
          <table class="table table-striped">
          <thead>
          <tr>
                <th scope="col">#</th>
                <th scope="col">Tiều đề</th>
                <th scope="col">Ảnh</th>
                <th></th>
                <th></th>
          </tr>
          </thead>
          <tbody>
          @if(count($tasks) == 0)
          <tr><td colspan="4">Không có dữ liệu</td></tr>
          @else
                @foreach($tasks as $key => $task)
                <tr>
                      <th scope="row">{{ ++$key }}</th>
                      <td>{{ $task->title }}</td>
                    
                      <td><img src="{{ asset('storage/'.$task->picture) }}" width="40" height="auto"></td>
                      <td><a href="{{ route('tasks.edit', $task->id) }}">sửa</a></td>
                      <td><a href="{{ route('tasks.destroy', $task->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                </tr>
                @endforeach
          @endif
          </tbody>
          </table>
          
          </div>
      </div>
@endsection