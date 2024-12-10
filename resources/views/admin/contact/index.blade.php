@extends('layouts.admin')
@section('title', 'Carausel Page')
<style>
    <style>body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .profile-card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #FCFFC1;
        padding: 20px;
        text-align: center;
    }

    .profile-img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin-bottom: 15px;
        border: 4px solid #007bff;
    }

    .icon-text {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 8px 0;
    }

    .icon-text i {
        margin-right: 10px;
        color: #007bff;
    }
</style>
</style>
@section('content')
    <div class="container mt-3">
        @if (!empty($success))
            <div class="alert alert-success">
                <strong>Success!</strong>{{ $success }}
            </div>
        @endif
        @if ($contact)
            <div class="row justify-content-center">
                <!-- Company Profile -->
                <div class="col-md-8 mb-4">
                    <div class="profile-card">
                        <img src="{{$contact->logo}}" alt="Company Logo" class="profile-img">
                        <h3 class="mb-3">Công Ty TNHH A&C</h3>
                        <div class="icon-text">
                            <i class="fa-solid fa-user"></i>
                            <span>{{$contact->person}}</span>
                        </div>
                        <div class="icon-text">
                            <i class="fas fa-envelope"></i>
                            <span>{{$contact->email}}</span>
                        </div>
                        <div class="icon-text">
                            <i class="fas fa-phone"></i>
                            <span>{{$contact->phone}}</span>
                        </div>
                        <div class="icon-text">
                            <i class="fas fa-map-marker-alt"></i>
                            <span> {{$contact->address1}}</span>
                        </div>
                        <div class="icon-text">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{$contact->address2}}</span>
                        </div>
                    </div>
                </div>
                <a class="btn btn-info w-50" href="{{ route('admin.contact.edit',$contact->id) }}">Cập nhật thông tin</a>
            </div>
        @endif


    </div>
@endsection
