@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Invoice Detail</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>hd20210625001 </h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Book</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                                                                    <tr>
                                <th scope="row">i</th>
                                <td>Con chut gi de nho</td>
                                <td>1</td>
                                <td>95,000 VND</td>
                            </tr>
                                                                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop