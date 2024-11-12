@extends('dashboard.layout.app')
@section('content')
@php
    $total = 0;
@endphp

    <section class="section">
<div class="row">
    <div class="col">
    <div class="card">
        <div class="card-body">


                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">إسم المنتج</th>
                            <th scope="col">سعر الواحدة</th>
                            <th scope="col">الكمية</th>
                            <th scope="col">مجمل كلفة المنتج</th>
                        </tr>
                    </thead>
                  <tbody>
                    @foreach ($content as $item)

                        <tr>
                            <th scope="row">{{$item->item->name}}</th>
                            <td>{{$item->pricePerUnit}} AED</td>
                            <td>{{$item->quantity}} 
                                @switch($item->item->price_by)
                                @case(1)
                                        <span class="badge bg-primary">Piece</span>
                                    @break
                                @case(2)
                                        <span class="badge bg-primary">Pack</span>
                                    @break
                                @case(3)
                                        <span class="badge bg-primary">Kg</span>
                                    @break
                                @default
                                    
                                @endswitch
                            </td>
                            <td>
                                @php
                                    $x = $item->totalCost;
                                    $total += $x;
                                @endphp
                                <span>AED {{$x}}</span>
                            </td>
                        </tr>
                      
                    @endforeach
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
        <span class="text-center"> <strong>كلفة الطلب الكلية: </strong>AED {{$total}}</span>
        </div>
    </div>
    </section>
@endsection