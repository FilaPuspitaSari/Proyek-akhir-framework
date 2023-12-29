<!DOCTYPE html>
<html lang="en">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
@extends('layout')
     
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1"> 
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Reseller</h1> 
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a class="btn btn-success" href="{{ route('resellers.create') }}"> Tambah Reseller</a>
              <!-- <li class="breadcrumb-item active">Contoh</li> -->
            </ol>
          </div> 

          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
          </div>
        </div> 

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table"> 
    <thead class="table- btn-secondary">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Telpon</th>
            <th>Alamat</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
        @foreach ($resellers as $reseller)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $reseller->name }}</td>
            <td>{{ $reseller->umur }}</td>
            <td>{{ $reseller->telp }}</td>
            <td>{{ $reseller->alamat }}</td>
            <td>
                <form action="{{ route('resellers.destroy',$reseller->id) }}" method="POST">
     
                    <!-- <a class="btn btn-info" href="{{ route('resellers.show',$reseller->id) }}">Show</a> -->
      
                    <a class="btn btn-primary" href="{{ route('resellers.edit',$reseller->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $resellers->links() !!}
        

</div>
</div>
</div>
</div>
</div>







    
        
@endsection