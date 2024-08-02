@extends('template/layout')

@section('title')
Login
@endsection

@section('content')
<div class="container">
  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="d-flex justify-content-center py-4">
            <a href="index.html" class="logo d-flex align-items-center w-auto text-decoration-none">
              <img src="assets/img/logo.png" alt="">
              <span class="d-none d-lg-block">Marketplace Katering</span>
            </a>
          </div><!-- End Logo -->

          <div class="card mb-3">

            <div class="card-body">
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                <p class="text-center small">Enter your personal details to create account</p>
              </div>

              <form class="row g-3" method="POST">
                @csrf
                @method('POST')
                <div class="col-12">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>

                <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="email" required>
                </div>

                <div class="col-12">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password" required>
                </div>

                <div class="col-12">
                  <label for="type_role" class="form-label">Role</label>
                  <select name="type_role" id="type_role" class="form-select" required>
                    <option value="">Choose Role</option>
                    <option value="Merchant">Merchant</option>
                    <option value="Customer">Customer</option>
                  </select>
                </div>

                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Create Account</button>
                </div>
                <div class="col-12">
                  <p class="small mb-0">Already have an account? <a href="{{ url('login') }}">Log in</a></p>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

</div>
@endsection