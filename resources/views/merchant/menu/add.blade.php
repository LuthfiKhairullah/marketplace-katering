@extends('template/layout')

@section('title')
Add Menu
@endsection

@section('content')
<section class="section">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Menu</h5>
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row mb-3">
              <label for="menu_name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="menu_name">
              </div>
            </div>
            <div class="row mb-3">
              <label for="menu_description" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" style="height: 100px" name="menu_description"></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="menu_picture" class="col-sm-2 col-form-label">Picture</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="menu_picture" name="menu_picture">
              </div>
            </div>
            <div class="row mb-3">
              <label for="menu_price" class="col-sm-2 col-form-label">Price</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="menu_price">
              </div>
            </div>

            <div class="row mb-3">
              <button type="submit" class="btn btn-primary">Add Menu</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection