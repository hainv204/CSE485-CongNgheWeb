<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Issues</title>
    <!-- Link CSS Bootstrap5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <header>
        <div class="d-flex justify-content-between bg-secondary">
            <h2 class="text-light pt-3">Issues Infomation Management</h2>
            <div class="mx-1 p-3">
                <a href="{{route('issues.create')}}">
                    <button class="btn btn-success">Add Issue</button>
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
                    <th class="py-3 text-center">Computer</th>
                    <th class="py-3 text-center">Model</th>
                    <th class="py-3 text-center">Reported_by</th>
                    <th class="py-3 text-center">Reported_date</th>
                    <th class="py-3 text-center">Urgency</th>
                    <th class="py-3 text-center">Status</th>
                    <th class="py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($issues)): ?>
                <tr>
                    <td colspan="5" class="py-3 text-center">No Issues</td>
                </tr>
                <?php else: ?>
                <?php
            foreach ($issues as $issue) : ?>
                <tr>
                    <td>{{$issue ->id}}</td>
                    <td>{{$issue ->computer->computer_name}}</td>
                    <td>{{$issue ->computer->model}}</td>
                    <td>{{$issue ->reported_by}}</td>
                    <td>{{$issue ->reported_date}}</td>
                    <td>{{$issue ->urgency}}</td>
                    <td>{{$issue ->status}}</td>
                    <td class="py-3 text-center">
                        <a href="{{route('issues.edit',$issue->id)}}" class="btn btn-warning m-1 w-75">Edit</a>
                        <a href="" class="btn btn-danger m-1 w-75" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $issue->id }}">Delete</a>
                        <!-- Modal confirm delete -->
                        <div class="modal fade" id="deleteModal{{ $issue->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel{{ $issue->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $issue->id }}">Confirm delete
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this issue?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('issues.destroy', $issue->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
    <footer class="mt-4">
        <div class="d-flex justify-content-center">
            {{ $issues->links('pagination::bootstrap-4') }}
        </div>
    </footer>
    <!-- Liên kết Bootstrap5 JS -->
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>

</html>