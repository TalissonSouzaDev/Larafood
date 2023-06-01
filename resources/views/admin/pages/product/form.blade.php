<div class="form-group">
    <label for="title">Titulo</label>
    <input type="text" name="title" class="form-control" value="{{$product->title ?? old("title")}}">
</div>

<div class="form-group">
    <label for="price">Preço</label>
    <input type="text" name="price" class="form-control" value="{{$product->price ?? old("price")}}">
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control">
</div>


<div class="form-group">
    <label for="description">Descrição</label>
    <textarea  name="description" rows="10" class="form-control">{{$product->description ?? old("description")}}</textarea>
</div>
