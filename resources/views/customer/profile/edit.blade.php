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
          <form action="{{ url('customer_profile') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <label for="customer_name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="customer_name" value="<?= $profile[0]['customer_name'] ?>">
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