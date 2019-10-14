@extends('layouts.global')

@section('title') Edit Orders @endsection

@section('pageTitle') Edit Orders @endsection

@section('content')

   <div class="row">
      <div class="col-md-8">
         

         <form action="{{ route('orders.update', $order->id) }}"
            class="shadow-sm bg-white p-3"
            method="POST">
            
            @csrf

            <input type="hidden" name="_method" value="PUT">

            <label for="invoice_number">Invoice Number</label>
            <input type="text" class="form-control" value="{{ $order->invoice_number }}" disabled>
            <br>

            <label for="">Buyer</label>
            <input disabled type="text" class="form-control" value="{{ $order->user->name }}">
            <br>

            <label for="created_at">Order date</label>
            <input type="text" class="form-control" value="{{ $order->created_at }}">
            <br>

            <label for="">Books {{ $order->totalQuantity }}</label>
            <ul>
               @foreach($order->books as $book)
                  <li>{{ $book->title }} <b>{{ $book->pivot->quantity }} </b></li>
               @endforeach
            </ul>

            <label for="">Total price</label>
            <input type="text" class="form-control" value="{{ $order->total_price }}" disabled>
            <br>

            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
               <option {{ $order->status == "SUBMIT" ? 'selected' : '' }} value="SUBMIT">SUBMIT</option>
               <option {{ $order->status == "PROCESS" ? 'selected' : '' }} value="PROCESS">PROCESS</option>
               <option {{ $order->status == "FINISH" ? 'selected' : '' }} value="FINISH">FINISH</option>
               <option {{ $order->status == "CANCEL" ? 'selected' : '' }} value="CANCEL">CANCEL</option>
            </select>
            <br>

            <input type="submit" class="btn btn-primary" value="Update">

         </form>

      </div>
   </div>


@endsection