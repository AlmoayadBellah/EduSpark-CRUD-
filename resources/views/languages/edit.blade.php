<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Language</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Edit Language</h1>

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
        action="{{ route('languages.update', $language->id) }}"
        method="POST"
    >

        @csrf

        @method('PUT')

        <div class="mb-3">

            <label for="code" class="form-label">
                Language Code
            </label>

            <input
                type="text"
                name="code"
                id="code"
                class="form-control @error('code') is-invalid @enderror"
                value="{{ old('code', $language->code) }}"
            >

            @error('code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label for="name" class="form-label">
                Language Name
            </label>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $language->name) }}"
            >

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <button
            type="submit"
            class="btn btn-primary"
        >
            Update
        </button>

        <a
            href="{{ route('languages.index') }}"
            class="btn btn-secondary"
        >
            Cancel
        </a>

    </form>

</div>

</body>
</html>