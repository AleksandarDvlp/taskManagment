<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manager</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js" integrity="sha512-ec1IDrAZxPSKIe2wZpNhxoFIDjmqJ+Z5SGhbuXZrw+VheJu2MqqJfnYsCD8rf71sQfKYMF4JxNSnKCjDCZ/Hlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.dark.min.css" integrity="sha512-TwhKh1HgMAOxx1412XkhJwdQkaRnRTzFsmJkMeT9YJkTrFvpgfiu51fccoNtalKoeN9X5YSgUynDbOlHAxT72A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>Task Manager</h3>
                <form action="{{route('store')}}" method="POST">
                @csrf
                    <div class="input-group">
                        <input type="text" name="taskName" class='form-control m-1' placeholder="add task"> 
                        <input type="text" name="projects" class='form-control m-1' placeholder="add project">
                        <button type="submit" class="btn btn-dark btn-sm px-3 m-1"><i class="fas fa-plus"> </i></button>
                    </div>
                </form>
                <hr>
                    <div class="col-auto m-1 ">
                        <form action="/" method="GET">
                        <select class="form-control bg-dark text-white mb-2" name="projects">
                            <option value="">- All Projects -</option>
                            @foreach( $todolists->unique('projects') as $todolist )
                                <option value="{{ $todolist->projects }}">{{ $todolist->projects }}</option>
                            @endforeach
                        </select>
                        <input type="submit">                    
                        </form>                    
                    </div>

                <hr>
                @if (count($todoListWithFilter))
                    <ul class="list-group list-group-flush mt-3">
                        @foreach ($todoListWithFilter as $todolist)
                            <li class='list-group-item-color-white'>
                                <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                                    {{$todolist->taskName}}<br> project : {{$todolist->projects}}
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @else 
                    <p class="text-center mt-3">There are no tasks</p>
                @endif
            </div>
                @if (count($todoListWithFilter))
                    <div class="card-footer">
                        You have {{ count($todolists)}} pending tasks
                    </div>
                @endif
        </div>
    </div>
    
</body>
</html>