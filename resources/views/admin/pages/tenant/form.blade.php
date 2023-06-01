<div class="form-group">
    <label for="title">Empresa</label>
    <input type="text" name="name" class="form-control" value="{{$tenant->name ?? old("name")}}">
</div>

<div class="form-group">
    <label for="price">CNPJ</label>
    <input type="text" name="cnpj" class="form-control" value="{{$tenant->cnpj ?? old("cnpj")}}">
</div>

<div class="form-group">
    <label for="price">E-mail</label>
    <input type="text" name="email" class="form-control" value="{{$tenant->email ?? old("email")}}">
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="logo" class="form-control">
</div>
