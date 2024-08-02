@extends('template/layout')

@section('title')
Profile
@endsection

@section('content')
<section class="section">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Profile</h5>
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <label for="merchant_name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="merchant_name" value="<?= $profile[0]['merchant_name'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label for="merchant_address" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="merchant_address" value="<?= $profile[0]['merchant_address'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label for="merchant_contact" class="col-sm-2 col-form-label">Contact</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="merchant_contact" value="<?= $profile[0]['merchant_contact'] ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label for="merchant_description" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" style="height: 100px" name="merchant_description"><?= $profile[0]['merchant_description'] ?></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <button type="submit" class="btn btn-warning">Edit Profile</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection