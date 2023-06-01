<div class="form-group">
    <label for="name">Identificação</label>
    <input type="text" name="identify" class="form-control" value="{{$table->identify ?? old("identify")}}">
</div>
<div class="form-group">
    <label for="email">Descrição</label>
    <textarea  name="description" rows="10" class="form-control">{{$table->description ?? old("description")}}</textarea>
</div>
