<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Issue</title>
    <!-- Link CSS Bootstrap5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <form action="{{route('issues.update',$issue->id)}}" method="POST" enctype="multipart/form-data">
        <!-- CSRF token để bảo vệ khỏi tấn công CSRF -->
        @csrf
        @method('PUT')
        <div class="header">
            <h4 class="title">Edit Issue</h4>
        </div>
        <div class="body">
            <div>
                <label for="computer_id" class="form-label">Computer</label>
                <select class="form-control" name="computer_id" id="computer_id">
                    @foreach($computers as $computer)
                    <option value="{{$computer->id}}">{{$computer->computer_name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description">{{$issue->description}}</textarea>
            </div>
            <div>
                <label for="reported_by" class="form-label">Reported_by</label>
                <input type="text" class="form-control" id="reported_by" name="reported_by"
                    value="{{$issue->reported_by}}" required>
            </div>
            <div>
                <label for="reported_date" class="form-label">Reported_date</label>
                <input type="datetime-local" class="form-control" id="reported_date" name="reported_date"
                    value="{{$issue->reported_date}}" required>
            </div>
            <div>
                <label for="urgency" class="form-label">Urgency</label>
                @php
                $urgency = ['Low', 'Medium', 'High'];
                @endphp
                <select class="form-control" name="urgency" id="urgency">
                    @foreach($urgency as $value)
                    <option value="{{$value}}" {{$issue->urgency==$value?'selected':''}}>{{$value}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="status" class="form-label">Status</label>
                @php
                $status = ['Open', 'in Progress', 'Resolved'];
                @endphp
                <select class="form-control" name="status" id="status">
                    @foreach($status as $value)
                    <option value="{{$value}}" {{$issue->status==$value?'selected':''}}>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="footer my-2">
            <button type="submit" class="btn btn-success" name="Edit">Edit</button>
        </div>
    </form>
</body>

</html>