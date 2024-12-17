<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List News</title>
    <!-- Link CSS Bootstrap5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <header>
        <div class="d-flex justify-content-between bg-secondary">
            <h2 class="text-light pt-3">New Infomation Management</h2>
            <div class="mx-1 p-3">
                <a href="{{route('news.create')}}">
                    <button class="btn btn-success">Add New</button>
                </a>
            </div>
        </div>
    </header>
    <main>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="py-3 text-center">ID</th>
                    <th class="py-3 text-center">Title</th>
                    <th class="py-3 text-center">Content</th>
                    <th class="py-3 text-center">Image</th>
                    <th class="py-3 text-center">Created_at</th>
                    <th class="py-3 text-center">Category Name</th>
                    <th class="py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($news)): ?>
                <tr>
                    <td colspan="5" class="py-3 text-center">No News</td>
                </tr>
                <?php else: ?>
                <?php
            foreach ($news as $new) : ?>
                <tr>
                    <td>{{$new ->id}}</td>
                    <td>{{$new ->title}}</td>
                    <td>{{$new ->content}}</td>
                    <td><img src="{{ asset('storage/' . $new->image) }}" alt="{{ $new->title }}"
                            style="max-height:120px; max-width: 150px;"></td>
                    <td>{{$new ->created_at}}</td>
                    <td>{{$new ->category->name}}</td>
                    <td class="py-3 text-center">
                        <a href="{{route('news.edit',$new->id)}}" class="btn btn-warning m-1 w-75">Edit</a>
                        <a href="" class="btn btn-danger m-1 w-75" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $new->id }}">Delete</a>
                        <!-- Modal xác nhận xóa -->
                        <div class="modal fade" id="deleteModal{{ $new->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel{{ $new->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $new->id }}">Xác nhận xóa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa bản tin này không?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Hủy</button>
                                        <form action="{{ route('news.destroy', $new->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <footer class="bg-light mt-4">
        <div class="container">
            <div class="row py-3">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2024 List Flowers</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Liên kết Bootstrap5 JS -->
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>

</html>