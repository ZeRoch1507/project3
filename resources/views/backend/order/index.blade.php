@extends('layouts.master_backend')

@section('con')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-top:2cm">Order</h4>
                <div class="table-responsive">
                    <label for="date">Select Date</label>
                    <select name="date" class="form-control" onchange="this.form.submit()">
                        <option value="">Select Date</option>
                        @foreach ($availableDates as $availableDate)
                            <option value="{{ $availableDate }}" {{ $selectedDate == $availableDate ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::parse($availableDate)->format('d/m/Y') }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            </form>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="card-title">Order</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Table</th>
                                <th>Order Number</th>
                                <th>Product Name</th>
                                <th>Amount</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $order)
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{ $order->table_number ?? 'No Data' }}</td>
                                        <td>{{ $order->order_ref }}</td>
                                        <td>{{ $item->product ? $item->product->name : 'Product Not Found' }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->price, 2) }} THB</td>
                                        <td>{{ number_format($item->price * $item->quantity, 2) }} THB</td>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->timezone('Asia/Bangkok')->format('d/m/Y H:i:s') }}
                                        </td>
                                        <td>
                                            @if ($order->status == 'completed')
                                                <button class="btn-status btn-success"
                                                    onclick="toggleStatus(this, {{ $order->id }}, 'pending')">Completed</button>
                                            @else
                                                <button class="btn-status"
                                                    onclick="toggleStatus(this, {{ $order->id }}, 'completed')">Incomplete</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            // Function to handle button click
            function toggleStatus(button, orderId) {
                var row = button.closest('tr');
                var currentStatus = row.getAttribute("data-status");
                var newStatus;

                // Toggle button status
                if (currentStatus === 'completed') {
                    newStatus = 'pending';
                    button.textContent = "Incomplete";
                    button.classList.remove("btn-success");
                    row.setAttribute("data-status", "pending");
                } else {
                    newStatus = 'completed';
                    button.textContent = "Completed";
                    button.classList.add("btn-success");
                    row.setAttribute("data-status", "completed");
                }

                // Save status in localStorage
                localStorage.setItem('orderStatus-' + orderId, newStatus);

                // Send updated status to the server
                updateOrderStatus(orderId, newStatus);
            }

            // Load saved status when the page refreshes
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll('tr[data-status]').forEach(function(row) {
                    var orderId = row.getAttribute('id').split('-')[1];
                    var savedStatus = localStorage.getItem('orderStatus-' + orderId);

                    if (savedStatus) {
                        var button = row.querySelector('.btn-status');
                        if (savedStatus === 'completed') {
                            button.textContent = "Completed";
                            button.classList.add("btn-success");
                            row.setAttribute("data-status", "completed");
                        } else {
                            button.textContent = "Incomplete";
                            button.classList.remove("btn-success");
                            row.setAttribute("data-status", "pending");
                        }
                    }
                });
            });

            // Function to send status update to the server
            function updateOrderStatus(orderId, status) {
                fetch(`/admin/order/update-status/${orderId}/${status}`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Order status updated successfully');
                    })
                    .catch(error => {
                        console.error('Error updating order status:', error);
                    });
            }
        </script>

        <style>
            /* Default button styles */
            .btn-status {
                padding: 10px 20px;
                font-size: 16px;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                background-color: red;
                transition: background-color 0.3s ease;
            }

            /* 'Completed' status */
            .btn-success {
                background-color: green;
            }

            /* Move button to the top for 'Completed' status */
            tr[data-status="completed"] .btn-status {
                order: 1;
            }

            /* Move button to the bottom for 'Incomplete' status */
            tr[data-status="pending"] .btn-status {
                order: 2;
            }
        </style>
@endsection
