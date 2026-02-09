@extends('admin.layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger text-danger bg-dark">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- @foreach ($products as $p) --}}
    <form action="{{ route('editPost', $rooms->id) }}" style="padding:10px; width:400px; margin:auto;" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="file-upload w-100 d-flex justify-content-center p-3">
            <div class="text-center">
                <div class="border border-3 edit_profiles_header m-auto"
                    style="width:350px; height:200px; position: relative;">
                    <div id="iconContainer" class="edit_profiles">
                        <!-- Button to trigger file input -->
                        <!-- Hidden file input -->
                        <input type="file" class="form-control-file" name="image" id="profile_photo"
                            style="display: none;" onchange="previewImage(event)">
                        <i class="fas fa-images"></i>
                    </div>
                    <!-- Image preview -->
                    <img src="/images/{{ $rooms->image }}" alt="" id="imageReview"
                        style="width: 100%; height: 100%; object-fit: cover;">
                    <img id="imagePreview" class="image-preview" src="/images" alt=""
                        style="width: 100%; height: 100%; object-fit: cover; display:none;">
                </div>
                <button type="button" class="file-upload-btn text-primary mt-1"
                    onclick="document.getElementById('profile_photo').click()">
                    Upload image
                </button>
            </div>
        </div>

        <div class="mb-2">
            <label for="roomNo" class="form-label">Room No</label>
            <input type="text" class="form-control" id="roomNo" name="room_no"
                value="{{ old('room_number', $rooms->room_number) }}" required>
        </div>
        <div class="mb-2">
            <label for="roomTitle" class="form-label">Room Title</label>
            <input type="text" class="form-control" id="roomTitle" name="room_title"
                value="{{ old('room_title', $rooms->room_title) }}" required>
        </div>
        <div class="mb-2">
            <label for="roomType" class="form-label">Room Type</label>
            <input type="text" class="form-control" id="roomType" name="room_type"
                value="{{ old('room_type', $rooms->room_type) }}" required>
        </div>
        <div class="mb-2">
            <label for="facilities" class="form-label">Facilities</label>
            <input type="text" min="0" class="form-control" id="facilities" name="facilities"
                value="{{ old('facilities', $rooms->facilities) }}" required>
        </div>
        <div class="mb-2">
            <label for="price" class="form-label">Price</label>
            <input type="number" min="0" class="form-control" id="price" name="price"
                value="{{ old('price', $rooms->price) }}" required>
        </div>
        <div class="mb-2">
            <p for="desc">Description</p>
            <textarea class="border border-2" name="desc" id="desc" cols="44" rows="10"
                value="{{ old('description', $rooms->description) }}"></textarea>
        </div>
        <div class="text-center d-flex">
            <button type="submit" class="btn btn-primary me-3">Save</button>
            <button type="reset" class="btn btn-secondary me-2">Cancel</button>
        </div>


    </form>

    <script>
        document.getElementById('img-f').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgPreview = document.getElementById('img-pic');
                    imgPreview.src = e.target.result;
                    imgPreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

@endsection
