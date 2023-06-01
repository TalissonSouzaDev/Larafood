<form action="{{route('profile.filter')}}" method="post" class="form form-inline">

@csrf

<div class="form-group">
    <input type="text" class="form-control" name="filter">
    <button class="btn btn-dark" type="submit">Busca</button>
</div>
</form>