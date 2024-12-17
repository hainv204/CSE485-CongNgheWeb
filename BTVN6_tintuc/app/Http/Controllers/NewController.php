<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;//import model Category
class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        // $news = News::with('category')->paginate(25);//Lấy 25 bản ghi mỗi trang
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();//Lấy ra category để chọn
        return view('news.create', compact('categories'));//compact để truyền dữ liệu từ Controllers sang Views
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|max:255',
            'content'=> 'required|max:255',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'created_at'=> 'required|date',
            'category_id'=> 'required',
        ]);
    // Xử lý upload ảnh
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }
        // News::create($request->all());
        // Tạo mới news với đường dẫn ảnh
        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'created_at' => $request->created_at,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('news.index')->with('success', 'Tạo mới news thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $new = News::findOrFail($id);
        $categories = Category::all();//Lấy ra category để chọn
        return view('news.edit', compact('new', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=> 'required|max:255',
            'content'=> 'required|max:255',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',//nullable để không bắt buộc phải upload ảnh
            'created_at'=> 'required|date',
            'category_id'=> 'required',
        ]);
        //Tìm đối tượng new cần sửa theo id
        $new = News::findOrFail($id);
        $imagePath = $new->image;//Lấy đường dẫn ảnh cũ
        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $new->image = $imagePath;
        }

        //Cập nhật thông tin new
        // $new->update($request->all());
        $new->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'created_at' => $request->created_at,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('news.index')->with('success', 'Cập nhật news thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $new = News::findOrFail($id);
        $new->delete();
        return redirect()->route('news.index')->with('success', 'Xoá news thành công');
    }
}