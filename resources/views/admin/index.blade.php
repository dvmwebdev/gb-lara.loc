@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <p>Користувачів</p>
                    <h3>{{$users}}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Переглянути <i
                        class="fas fa-eye"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <p>Заблокованих користувачів</p>
                    <h3>{{$usersBaned}}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Переглянути <i
                        class="fas fa-eye"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <p>Користувачів</p>
                    <h3>{{$users}}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Переглянути <i
                        class="fas fa-eye"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <p>Заблокованих користувачів</p>
                    <h3>{{$usersBaned}}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Переглянути <i
                        class="fas fa-eye"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <hr>
@endsection
