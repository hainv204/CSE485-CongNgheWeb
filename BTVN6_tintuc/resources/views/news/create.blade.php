<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New</title>
    <!-- Link CSS Bootstrap5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
        <!-- CSRF token để bảo vệ khỏi tấn công CSRF -->
        @csrf
        <div class="header">
            <h4 class="title">Add New</h4>
        </div>
        <div class="body">
            <div>
                <label for="title" class="form-label">Title</label>
                <input class="form-control" type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>
            <div>
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image" required>
            </div>
            <div>
                <label for="created_at" class="form-label">Created_at</label>
                <input class="form-control" type="date" id="created_at" name="created_at" required>
            </div>
            <div>
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="footer my-2">
            <button type="submit" class="btn btn-success" name="addFlowerBtn" value="Add">Add</button>
        </div>
    </form>
</body>

</html>