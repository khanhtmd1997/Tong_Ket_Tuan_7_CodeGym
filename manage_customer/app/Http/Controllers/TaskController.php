<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use http\Env\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class TaskController extends Controller
{
    public function index(){
    	$tasks = Task::all();
    	return view('tasks.list',compact(['tasks']));
    }

    public function create(){
    	return view('tasks.create');
    }

    public function store(Request $request){
    	$tasks = new Task();
    	$tasks->title = $request->input('title');
    	$tasks->content = $request->input('content');

    	//upfile
    	if($request->hasFile('picture')){
    		$picture = $request->file('picture');
    		$path = $picture->store('picture','public');
    		$tasks->picture = $path;
    	}

    	Session::flash('success',"Tạo thành công");
    	$tasks->save();

    	return redirect()->route('tasks.index');
    }

     public function edit($id){
      	$task = Task::findOrFail($id);
      	return view('tasks.edit', compact('task'));
  	}

  	public function update(Request $request, $id){
      	$task = Task::findOrFail($id);
      	$task->title = $request->input('title');
      	$task->content = $request->input('content');

      	//cap nhat anh
      	if ($request->hasFile('picture')) {

          	//xoa anh cu neu co
          	$currentImg = $task->picture;
          	if ($currentImg) {
              	Storage::delete('/public/' . $currentImg);
          	}
          	// cap nhat anh moi
          	$picture = $request->file('picture');
          	$path = $picture->store('images', 'public');
          	$task->picture = $path;
      	}

      	$task->save();

      	//dung session de dua ra thong bao
      	Session::flash('success', 'Cập nhật thành công');
      	//tao moi xong quay ve trang danh sach task
      	return redirect()->route('tasks.index');
  	}
  	 public function destroy($id){
      	$task = Task::findOrFail($id);
      	$picture = $task->picture;

      	//delete picture
      	if ($picture) {
          	Storage::delete('/public/' . $picture);
      	}

      	$task->delete();

      	//dung session de dua ra thong bao
      	Session::flash('success', 'Xóa thành công');
      	//xoa xong quay ve trang danh sach task
      	return redirect()->route('tasks.index');
  	}
}
