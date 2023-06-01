<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control" value="{{$user->name ?? old("name")}}">
</div>
<div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" name="email" class="form-control" value="{{$user->email ?? old("email")}}">
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password"  name="password" class="form-control" value="{{old("password")}}">
</div>