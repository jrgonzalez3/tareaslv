 <div class="col-md-9">
     <div class="card">
         <div class="card-header">{{ __('Lista de Tareas') }}</div>

         <div class="card-body">
             @if (session('status'))
             <div class="alert alert-success" role="alert">
                 {{ session('status') }}
             </div>
             @endif
             @if(!empty($tasks))
             <table id="datatable" class="table table-responsive table-hover table-bordered">
                 <thead class="thead-light">
                     <th>Id Task</th>
                     <th>Id User</th>
                     <th>Titulo</th>
                     <th>Descripcion</th>
                     <th>Creado</th>
                     <th>Actualizado</th>
                     <th>Acciones</th>
                 </thead>
                 <tbody>
                     @foreach ($tasks as $task)
                     <tr>
                         <td scope="row">{{$task->id}}</td>
                         <td>{{$task->user_id}}</td>
                         <td>{{$task->title}}</td>
                         <td>{{$task->description}}</td>
                         <td>{{$task->created_at}}</td>
                         <td>{{$task->updated_at}}</td>
                         <td class="text-center">

                             <a href="{{route('task.edit_view', [$task->id])}}" class="btn btn-primary">Editar</a>



                             <form action="{{route('task.destroy', [$task->id])}}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger">Eliminar</a>
                             </form>


                         </td>

                     </tr>
                     @endforeach
                 </tbody>
                 <tfoot>
                     <tr>
                         <td colspan="7">Se han encontrado {{count($tasks)}} registros </td>
                     </tr>
                 </tfoot>
             </table>
             @endif
         </div>
     </div>
 </div>