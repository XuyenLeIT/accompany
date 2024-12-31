@extends('layouts.admin')

@section('title', 'Carausel Page')

@section('content')
    <div class="container p-5">
        <h1>CẬP NHẬT GIỚI THIỆU CÔNG TY</h1>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>Info!</strong> {{ session('info') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.intro.company.update', $introCompany) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text"  class="form-control" value="{{ $introCompany->title }}" name="title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="current" class="form-label">Curent Image:</label>
                <input type="hidden" value="{{ $introCompany->image }}" name="imageExisting">
                <img src="{{ $introCompany->image }}" width="150" class="img-thumbnail">
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
                <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ old('description', $introCompany->description) }}</textarea>
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
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']], // Thêm công cụ chỉnh size chữ
                ['fontname', ['fontname']], // Thêm công cụ chọn font chữ
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            fontSizes: ['8', '10', '12', '14', '16', '18', '24', '36', '48', '64', '82', '150'], // Cấu hình tùy chọn size chữ
        });
    
        // Lấy nội dung từ Summernote nếu cần
        let markupStr = $('#description').summernote('code');
    </script>
@endsection
