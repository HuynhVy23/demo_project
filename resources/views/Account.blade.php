
@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Account</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="button-list">
        <a class="btn btn-warning btn-rounded m-b-10 m-l-5" href="{{ route('AddAccount') }}">Add New Staff</a>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Full Name</th>
                                <th>Sex</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Account Type</th>
                                <th>Status</th>
                                <th>Avatar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <form action="" method="POST">
                                                                    <tr>
                                <td>htjgn</td>
                                <td>$2y$10$uq9Fh2PEoc3EVKWE4MwEZOunaVFvDui.lSBKa12VM1JNW/CitFamC</td>
                                <td>dasfsf</td>
                                <td>Female</td>
                                <td>0123446796</td>
                                <td>fsdgfdhghfg</td>
                                <td>dqwed@gmail.com</td>
                                <td>User</td>
                                <td>Deactive</td>
                                <td><img src=""width="100px" height="100px"> </td>
                                <td><a class="btn btn-info btn-rounded " href="{{ route('UpdateAccount') }}"> Update</a></td>
                            </tr>
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@stop