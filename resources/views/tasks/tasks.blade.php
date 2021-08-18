@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        @include('tasks.tasks-form')


    </div>
    @include('tasks.tasks-list')
</div>

</div>
</div>
</div>
@endsection