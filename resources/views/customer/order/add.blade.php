@extends('template/layout')

@section('title')
Orders
@endsection

@section('content')
<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Order History</h5>
          <table class="table datatable">
            <thead>
              <tr>
                <th>No</th>
                <th>Invoice ID</th>
                <th>Delivery Date</th>
                <th>Total Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $number = 0;
              foreach ($list_menu as $order) { ?>
                <tr>
                  <th><?= $number++ ?></th>
                  <td><?= $order['order_invoice'] ?></td>
                  <td><?= $order['order_delivery_date'] ?></td>
                  <td><?= $order['total_price'] ?></td>
                  <td><button>Edit</button></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>
@endsection