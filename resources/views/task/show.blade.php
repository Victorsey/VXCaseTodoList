<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($message != '')
    <div>
        <h3>{{$message}}<h3>
    </div>
    @endif
    <div>
        <form action="{{ route('task.create')}}" method="POST">
            @csrf
            <input type="text" value="" name="task">
            <button type="submit">Cadastrar</button>
        </form>
    </div>
    @foreach($tasks as $index => $task)
    <div class="container">
        <h5>{{$task->task}}</h5>
        <form action="{{route('task.check', $task->id)}}" method="POST" enctype="multipart/form-data" id="taskForm_{{$index}}">
            @csrf
            <input type="hidden" name="id" value="{{$task->id}}">
            <input type="hidden" name="completed" value=0>
            <input type="checkbox" name="completed" value=1 {{$task->completed ? "checked" : ""}}>
        </form>
        <form action="{{route('task.delete', $task->id)}}" method="POST" enctype="multipart/form-data">
            @method('DELETE')
            @csrf
            <input type="hidden" name="id" value="{{$task->id}}">
            <button>Deletar</button>
        </form>
        
    </div>
    @endforeach
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var checkboxes = document.querySelectorAll('form[id^="taskForm_"] input[type="checkbox"]');

            checkboxes.forEach(function(checkbox){
                checkbox.addEventListener('change', function(event){
                    var form = event.target.closest('form');

                    if(form){
                        form.submit();
                    }
                });
            })
        })
        /* var checkboxes = document.getElementsByClassName('taskCheckbox');
        var forms = document.querySelectorAll('form[id^="taskForm_"]');

        for (var i=0; i < checkboxes.lenght; i++){
            checkboxes[i].addEventListener('change', function (){
                form[i].submit();
            });
        } */
    </script>
</body>

</html>