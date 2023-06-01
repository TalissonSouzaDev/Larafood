@if (session('sucess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
 <p>  {{ session('sucess')}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
    
@endif

@if (session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
 <p>  {{ session('warning')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
    
@endif


@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
@foreach ($errors->all() as $error)
<p>{{$error}}</p>
    
@endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
    
@endif