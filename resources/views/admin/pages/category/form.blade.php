<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control" value="{{$category->name ?? old("name")}}">
</div>
<div class="form-group">
    <label for="email">Descrição</label>
    <textarea  name="description" rows="10" class="form-control">{{$category->description ?? old("description")}}</textarea>
</div>
