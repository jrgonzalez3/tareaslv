  <div class="@if (!empty($task)) col-md-12 @else col-md-3 @endif">
      <div class="card">
          <div class="card-header">{{ __('Tarea') }}</div>

          <div class="card-body">
              @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
              @endif
              <form action="{{!empty($task) ? route('task.edit', [$task->id]) : route('tasks.store')}}" method="POST">
                  @csrf

                  <div class="form-group">
                      <label for="title">Titulo</label>
                      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                          value="{{ !empty($task) ? $task->title : old('title') }}" required autocomplete="title"
                          autofocus>
                      @error('title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="description">Descripcion</label>
                      <input type="text" name="description"
                          class="form-control @error('description') is-invalid @enderror"
                          value="{{ !empty($task) ? $task->description : old('description') }}"
                          autocomplete="description">
                      @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                  <button type="submit" href="" class="btn btn-success">@if(!empty($task))Editar @else Guardar
                      @endif</button>
                  <button class="btn btn-primary" type="reset"> Limpiar </button>
              </form>
          </div>
      </div>