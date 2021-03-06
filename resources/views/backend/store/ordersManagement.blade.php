@extends('layouts.admin')
@section('orderssection')
<div class="container">
    <div class="row justify-content-center">
    <h2 style="margin-bottom: 20px;">Orders management</h2>
 <!-- DATA TABLE-->
 <div class="table-responsive m-b-40">
                                <!--
                                 <form method="POST" action="{{ route('admin.store.order.create')}}" id="addo">
                                    @csrf
                                </form>
                                -->
                               
                                  
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Order number</th>
                                                <th>Name of product</th>
                                                <th>Status</th>
                                                <th>Date of placing order</th>
                                                <th>Payment method</th>
                                                <th>Name client</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $singlerow)
                                            <tr id="editp-row-{{$singlerow->id_order}}">
                                                <td id="id-o" >{{$singlerow->id_order}}</td>
                                                <td>Men</td>
                                                <td>
                                                  <div class="rs-select2--trans rs-select2--sm">
                                                                <select class="form-control" id="selectOption" name='selectOption' form="edito">
                                                                    <option value="{{$singlerow->id_order}}">{{$singlerow->status}}</option>
                                                                  
                                                                    @foreach($status as $single)
                                                                    
                                                                    @if($single->status !== $singlerow->status)
                                                                    <option value="{{$single->id}}">{{$single->status}}</option>
                                                                    @endif
                                                                   
                                                                    @endforeach
                                                                
                                                                </select>
                                                    <?php
                                                      // echo Form::select('size', array('L' => 'Large', 'S' => $singlerow->status),'S');
                                                    ?>
                                                   <div class="dropDownSelect2"></div>
                                                </div>
                                                </td>
                                                <td>{{$singlerow->date_of_placing_order}}</td>
                                                <td class="process">{{$singlerow->payment_method}}</td>
                                                <td>{{$singlerow->name}} {{$singlerow->surname}}</td>
                                                <td>
                                        
                                                    

                                                        <a class="orderdel" href="{{ route('admin.store.order.destroy',['id_o' => $singlerow->id_order]) }}">
                                                        <button class="item">
                                                        <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        </a>
                                                    </div>
                                                </td>
                                                </tr>
                                              
                                                @endforeach
                                        </tbody>
                                    </table>
                                    <form method="GET" action="{{ route('admin.store.order.update')}}" id="edito">
                                    @csrf
                                    </form>
                                </div>
                                <!-- END DATA TABLE-->
    </div>
</div>
@endsection