<h1>Your Shopping Cart</h1>

@if (count($cartItems) > 0)
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Subtotal</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cartItems as $cartItem)
        @php
          // Assuming you have a Product model and a price attribute
          $product = $cartItem->product;
          $price = $product->price;
          $subtotal = $price * $cartItem->quantity;
        @endphp
        <tr>
          <td>{{ $product->name }}</td>
          <td>{{ $cartItem->quantity }}</td>
          <td>{{ number_format($price, 2) }}</td>
          <td>{{ number_format($subtotal, 2) }}</td>
          <td>
            <form action="/cart/update/{{ $cartItem->id }}" method="POST">
              @csrf
              <input type="number" name="quantity" min="1" value="{{ $cartItem->quantity }}">
              <button type="submit" class="btn btn-sm btn-secondary">Update</button>
            </form>
            <form action="/cart/remove/{{ $cartItem->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Remove</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <a href="/checkout" class="btn btn-primary">Proceed to Checkout</a>

@else
  <p>Your cart is currently empty.</p>
@endif