@extends('layouts.admin')

@section('title', 'Post admin Page')

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{ route('admin.price.index') }}">Danh sách price</a>
        <h1>Create form post</h1>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>Info!</strong> {{ session('info') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.price.update', $price) }}">
            @csrf
            <div class="mb-3 mt-3">
                <label for="package" class="form-label">Package:</label>
                <input type="text" class="form-control" placeholder="nhập goi giam sat"
                    value="{{ old('package', $price->package) }}" name="package">
                @error('package')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="timew" class="form-label">Time week(số buổi trong tuần):</label>
                <input type="text" class="form-control" placeholder="nhap thoi gian"
                    value="{{ old('timew', $price->timew) }}" name="timew">
                @error('timew')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="timed" class="form-label">Time Day(số giờ trong ngày):</label>
                <input type="text" class="form-control" placeholder="nhap thoi gian"
                    value="{{ old('timed', $price->timed) }}" name="timed">
                @error('timed')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="cost" class="form-label">Chi phi:</label>
                <input type="number" class="form-control" placeholder="nhap chi phi" value="{{ old('cost', $price->cost) }}"
                    name="cost">
                @error('cost')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="note" class="form-label">note:</label>
                <input type="text" class="form-control" placeholder="nhập luu y" value="{{ old('note', $price->note) }}"
                    name="note">
                @error('note')
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
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['color', ['color']], // 👈 Thêm công cụ chọn màu
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
