@extends('layouts.admin')

@section('title', 'Carausel Page')

@section('content')
    <div class="container p-5">
        <a class="btn btn-primary" href="{{ route('admin.project.index') }}">Back to list</a>
        <h1>Tạo thông tin về dự án mới</h1>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>Info!</strong> {{ session('info') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.project.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" value="{{old('title')}}" name="title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="owner" class="form-label">Owner:</label>
                <input type="text" class="form-control" value="{{old('owner')}}" name="owner">
                @error('owner')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="area" class="form-label">Area:</label>
                <input type="number" class="form-control" name="area" value="{{old('area')}}">
                @error('area')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="year" class="form-label">Year Complete:</label>
                <input type="number" class="form-control" name="year" value="{{old('year')}}">
                @error('year')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="type" class="form-label">Loai công trình:</label>
                <select class="form-select" name="type">
                    <option value="">===CHON KIỂU CÔNG TRÌNH===</option>
                    <option value="NHAPHO" @selected(old('type')=="NHAPHO")>NHÀ PHỐ</option>
                    <option value="BIETTHU" @selected(old('type')=="BIETTHU")>BIỆT THỰ</option>
                    <option value="CANHO" @selected(old('type')=="CANHO")>CĂN HỘ</option>
                    <option value="SCHOOL" @selected(old('type')=="SCHOOL")>TRƯỜNG HỌC</option>
                  </select>
                @error('type')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Image:</label>
                <input type="file" class="form-control" name="image">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="image" class="form-label">Description:</label>
                <textarea name="description"  id="description"  class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        $('#description').summernote({
            tabsize: 2,
            height: 300
        });
        let markupStr = $('#summernote').summernote('code');
    </script>
@endsection
