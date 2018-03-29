<div class="col-md-3 ">
  <form method="POST" id="addUser" enctype="multipart/form-data" >
      {{ csrf_field() }}

      <div class="form-group has-feedback">
          <input type="text" name="name" class="form-control" placeholder="Your name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <span class="text-danger">
              <strong id="name-error">{{$errors}}</strong>
          </span>
      </div>
      <div class="form-group has-feedback">
          <input type="text" name="surname" class="form-control" placeholder="last name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>
      <div class="form-group has-feedback">
          <input type="text" name="keywords" class="form-control" placeholder="keywords">
          <span class="glyphicon glyphicon-tags form-control-feedback"></span>

      </div>


      <div class="row">
          <div class="col-xs-12 text-center">
            <button type="submit" id="sendData" class="btn btn-success">Search</button>
          </div>
      </div>
  </form>
</div>

<div class="coll-md-3">
  <img src="{{asset('img/icon.png')}}" style="width: 250px">
</div>

<div class="coll-md-12">
@if ($list)
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Keywords</th>
      <th scope="col">Download link</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($list as $k => $item)

      <tr>
        <th scope="row">{{$k}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->surname}}</td>
        <td>{{$item->keywords}}</td>
        <td><a href="{{route('download', $item->file_name)}}">CV</a></td>
      </tr>
    @endforeach

  </tbody>
</table>
@endif
</div>
