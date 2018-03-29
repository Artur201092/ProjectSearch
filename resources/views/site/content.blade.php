
<div id="success-msg" class="{{$hide}}">
    <div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <strong>User Added</strong>
    </div>
</div>
  <div class="col-md-3 ">
    <form method="POST" id="addUser" enctype="multipart/form-data" >
        {{ csrf_field() }}

        <div class="form-group has-feedback">
            <input type="text" name="name" class="form-control" placeholder="Your name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <span class="text-danger">
                <strong id="name-error">{{ $errors ? $errors['name'] : ''}}</strong>
            </span>
        </div>
        <div class="form-group has-feedback">
            <input type="text" name="surname" class="form-control" placeholder="last name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <span class="text-danger">
                <strong id="name-error">{{ $errors ? $errors['surname'] : ''}}</strong>
            </span>
        </div>
        <div class="form-group has-feedback">
            <input type="text" name="keywords" class="form-control" placeholder="keywords">
            <span class="glyphicon glyphicon-tags form-control-feedback"></span>
            <span class="text-danger">
                <strong id="name-error">{{ $errors ? $errors['keywords'] : ''}}</strong>
            </span>
        </div>

        <div class="form-group has-feedback">
  		 		<input type="file" name="cv">
          <span class="text-danger">
              <strong id="file-error">{{ $errors ? $errors['file'] : ''}}</strong>
          </span>
  		 	</div>


        <div class="row">
            <div class="col-xs-12 text-center">
              <button type="submit" id="sendData" class="btn btn-success">Send Data</button>
            </div>
        </div>
    </form>
  </div>

  <div class="coll-md-9">
    <img src="{{asset('img/icon4.jpg')}}" style="width: 250px">
  </div>
