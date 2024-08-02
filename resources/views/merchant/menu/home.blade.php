@extends('template/layout')

@section('title')
List Menu
@endsection

@section('content')
<h5>List Menu</h5>

<section class="section">
  <div class="row">
    <div class="col-12 mb-3">
      <a class="btn btn-primary" href="{{ url('merchant_menu/add') }}">Add Menu</a>
    </div>
    <?php foreach ($list_menu as $menu) { ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card">
          <img src="{{ asset('storage/storage/menu_picture/' . $menu->menu_picture) }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $menu['menu_name'] ?></h5>
            <p class="card-text"><?= $menu['menu_description'] ?></p>
            <p class="card-text">Rp. <?= str_replace(',', '.', number_format($menu['menu_price'])) ?></p>
          </div>
          <div class="card-footer d-flex">
            <a class="btn btn-warning me-1" href="{{ url('merchant_menu/edit/' . $menu->menu_id) }}">Edit</a>
            <form action="{{ url('merchant_menu/delete/' . $menu->menu_id) }}" method="post" onclick="return confirm('Are you sure want delete it?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</section>
@endsection