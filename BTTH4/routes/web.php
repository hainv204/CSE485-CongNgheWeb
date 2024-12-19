<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;
//Path index
Route::get('/', [IssueController::class, 'index'])->name('issues.index');
//Path view create issues
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');
//Path store issues
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');
//Path view edit issues
Route::get('/issues/{id}/edit', [IssueController::class, 'edit'])->name('issues.edit');
//Path update issues
Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update');
//Path delete issues(confirm modal)
Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');