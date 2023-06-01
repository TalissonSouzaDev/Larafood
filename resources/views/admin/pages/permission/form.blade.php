<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control" value="{{$permission->name ?? old("name")}}">
</div>


<div class="form-group">
    <label for="description">Descrição</label>
    <textarea name="description" id="" cols="161" rows="10">{{$permission->description ?? old("description")}}</textarea>
</div>