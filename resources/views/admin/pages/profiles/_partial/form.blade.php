                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{$profile->name ?? old("name")}}">
                </div>

                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" name="description" class="form-control" placeholder="description:" value="{{$profile->descrption ?? old("descrption")}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>