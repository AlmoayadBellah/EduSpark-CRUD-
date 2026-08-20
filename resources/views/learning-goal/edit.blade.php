<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Learning Goal</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Edit Learning Goal</h1>

    {{-- Show validation errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('learning-goals.update', $learningGoal) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-3">

            <label for="name" class="form-label">
                Learning Goal Name
            </label>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $learningGoal->name) }}"
            >

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        {{-- Buttons --}}
        <button
            type="submit"
            class="btn btn-success"
        >
            Update
        </button>

        <a
            href="{{ route('learning-goals.index') }}"
            class="btn btn-secondary"
        >
            Cancel
        </a>

    </form>

</div>

</body>
</html>