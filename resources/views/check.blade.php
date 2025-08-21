<head>

    <title> check</title>
    <style>
        @media print {
            #print_her {
                display: none;
            }
            #print-area{
                background-color: red!important;
            }
        }
    </style>

    <link  href="{{ asset('assets/css/bootstrap.min.css') }}" media="all" type="text/css" rel="stylesheet">
    <link  href="{{ asset('assets/css/bootstrap.css') }}" media="all" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fa/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/fa/css/font-awesome.css')}}">
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>


</head>

<body>
@include('navbar')

<div id="print-area" class="mx-5">
    <h2 class="successfully">Order Saved Successfully</h2>
    <h4 class="text-dark">Order Number: {{ $order->reference_number }}</h4>

    <div class="row">
        <div class="cards-container col-md-8">
            @foreach($order_details as $order_detail )
                <div class="card flex-row my-1">
                    <div>
                        <img src="{{ asset('assets/image/'.$order_detail->product->image) }}" alt="" class="w-75 img">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $order_detail->product->name }}</h5>
                        <p class="card-text px-2">
                            <strong>Price per one:</strong> {{ $order_detail->product->price }} -
                            <strong>Quantity:</strong> {{ $order_detail->quantity }}
                        </p>
                        <p class="card-text px-2">
                            <strong>Total Price:</strong> {{ $order_detail->total_price }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="user-container card col-md-4 p-2">
            <h2>User Info</h2>
            <p class="card-text px-2"><strong>Name:</strong> {{$user_details->name }}</p>
            <p class="card-text px-2"><strong>Phone:</strong> {{ $user_details->phone }}</p>
            <p class="card-text px-2"><strong>Email:</strong> {{ $user_details->email }}</p>
            <p class="card-text px-2"><strong>Address:</strong> {{ $user_details->address }}</p>
            <hr>
            <h2>Check Order</h2>
            <div>
                <p class="card-text px-2"><strong>Cart Total:</strong> {{ $order->cart_total }}</p>
                <button class="btn btn-sm btn-dark mb-3 w-auto" type="button" id="print_her">Print</button>
            </div>

            <form method="post" action="{{ route('delete', $order->id) }}" onsubmit="return confirm('Are you sure you want to delete this order?');">
                @csrf
                @method('post')

                <button class="btn btn-sm btn-danger mb-3 w-auto" type="submit">
                    Delete
                </button>
            </form>

        </div>
    </div>
</div>
<br>
<br>
<br>
@include('footer')
</body>
<script>
    $('#print_her').click(function () {
        var printContent = $('#print-area').html();
        var printWindow = window.open('', '', 'height=1000,width=1500');

        printWindow.document.write('<html><head><title>Print</title>');

        // Include your existing CSS
        printWindow.document.write('<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">');
        printWindow.document.write('<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">');
        printWindow.document.write('<link rel="stylesheet" href="{{ asset('assets/fa/css/font-awesome.min.css') }}">');

        // 👇 Inject custom print styles
        printWindow.document.write(`
                                    <style>
                                        @media print {
                                            #print_her {
                                                display: none !important;
                                            }
                                            #print-area {
                                                padding: 60px !important;
                                            }
                                            .successfully{
                                            display: none;
                                            }
                                            .img{
                                            display: none;
                                            }
                                        }
                                    </style>
                                `);

        printWindow.document.write('</head><body>');
        printWindow.document.write(printContent);
        printWindow.document.write('</body></html>');

        printWindow.document.close();
        printWindow.focus();

        printWindow.onload = function () {
            printWindow.print();
            printWindow.close();
        };
    });

</script>
