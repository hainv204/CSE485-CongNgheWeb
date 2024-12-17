<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
//Đường dẫn hiển thị danh sách news trên trang chủ
Route::get('/', [NewController::class, 'index'])->name('news.index');//Đặt tên name để có thể dùng helper route()
//Đường dẫn hiển thị form tạo mới news
Route::get('/news/create', [NewController::class, 'create'])->name('news.create');
//Đường dẫn lưu dữ liệu khi tạo mới news
Route::post('/news', [NewController::class, 'store'])->name('news.store');
//Đường dẫn hiển thị form sửa news
Route::get('/news/{id}/edit', [NewController::class, 'edit'])->name('news.edit');
//Đường dẫn câp nhật dữ liệu khi sửa news
Route::put('/news/{id}', [NewController::class, 'update'])->name('news.update');
//Đường dẫn để xoá news(xoá có modal xác nhận)
Route::delete('/news/{id}', [NewController::class, 'destroy'])->name('news.destroy');