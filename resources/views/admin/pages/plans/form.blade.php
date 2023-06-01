<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control" value="{{$plan->name ?? old("name")}}">
</div>
<div class="form-group">
    <label for="price">Preço</label>
    <input type="text" name="price" class="form-control" value="{{$plan->price ?? old("price")}}">
</div>

<div class="form-group">
    <label for="description">Descrição</label>
    <textarea name="description" id="" cols="161" rows="10">{{$plan->description ?? old("description")}}</textarea>
</div>