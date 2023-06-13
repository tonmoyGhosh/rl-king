
@extends('layouts.frontend_app')

@section('content')

<div class="row">
 
    <div class="card" style="width:500px">
        <div class="card-body">
        <p class="card-text" style="color: #3699ff">You can join as Coin Or Host Agency to enjoy the services</p>
        <a href="{{ route('coinAgencyRegisterForm') }}" class="btn btn-primary">Register As Coin Agency</a>
        <br><br>
        <a href="{{ route('hostAgencyRegisterForm') }}" class="btn btn-primary">Register As Host Agency</a>
        </div>
    </div>

</div>

<br>

<div class="row">

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="color: #3699ff">Special title treatment</h5>
                <p class="card-text" style="color: #3699ff">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
  
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="color: #3699ff">Special title treatment</h5>
                <p class="card-text" style="color: #3699ff">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="color: #3699ff">Special title treatment</h5>
                <p class="card-text" style="color: #3699ff">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="color: #3699ff">Special title treatment</h5>
                <p class="card-text" style="color: #3699ff">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
  
</div>


@endsection