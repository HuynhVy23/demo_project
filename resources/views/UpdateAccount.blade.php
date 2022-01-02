@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Catagory Update</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-6">
        <div class="card">
        <div class="button-list">
            <form action="" method="POST">
            
            Username :<pre></pre><input type="text" value="htjgn" name="user" readonly></br></br>
            Password :<pre></pre><input type="text" value="$2y$10$uq9Fh2PEoc3EVKWE4MwEZOunaVFvDui.lSBKa12VM1JNW/CitFamC" name="pass" readonly></br></br>
            Full Name :<pre></pre><input type="text" value="dasfsf" name="hoten" readonly></br></br>
            Sex :<pre></pre><input type="text" value="Female" name="giotinh" readonly></br></br>
            Phone :<pre></pre><input type="text" value="0123446796" name="sdt" readonly></br></br>
            Address :<pre></pre><input type="text" value="fsdgfdhghfg" name="diachi" readonly></br></br>
            Account Type :<pre></pre><input type="text" value="User" name="loaitk" readonly></br></br>
            Status : <select name="tinhtrang" > 
            <option value="tk0"  >
            
                Active                            </option>
             
            <option value="tk1" selected='selected' >
            
                Deactive                            </option>
                                        </select></br></br>
            <input class="btn btn-success" type="submit" name="submitTK" value="Submit">
                </div>
            </div>
        </div>
        <div class="col-6">
        <div class="card">
        <h3 class="text-primary">Avatar :</h3>
        <img src=" "width="200px" height="400px"> </br></br>
        </form>
        </div>
        </div>
    </div>
</div>
@stop