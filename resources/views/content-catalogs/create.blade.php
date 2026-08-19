<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Content Catalog</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Create Content Catalog</h1>

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
        action="{{ route('content-catalogs.store') }}"
        method="POST"
    >

        @csrf

        {{-- Title --}}
        <div class="mb-3">

            <label for="title" class="form-label">
                Title
            </label>

            <input
                type="text"
                name="title"
                id="title"
                class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title') }}"
            >

            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Description --}}
        <div class="mb-3">

            <label for="description" class="form-label">
                Description
            </label>

            <textarea
                name="description"
                id="description"
                rows="5"
                class="form-control @error('description') is-invalid @enderror"
            >{{ old('description') }}</textarea>

            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        {{-- Slug --}}
<div class="mb-3">

    <label for="slug" class="form-label">
        Slug
    </label>

    <input
        type="text"
        name="slug"
        id="slug"
        class="form-control @error('slug') is-invalid @enderror"
        value="{{ old('slug') }}"
        placeholder="example-content-catalog"
    >

    @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
{{-- Size --}}
<div class="mb-3">

    <label for="size" class="form-label">
        Size
    </label>

    <input
        type="number"
        name="size"
        id="size"
        class="form-control @error('size') is-invalid @enderror"
        value="{{ old('size') }}"
        min="0"
        placeholder="Enter size"
    >

    @error('size')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
{{-- Cost --}}
<div class="mb-3">

    <label for="cost" class="form-label">
        Cost
    </label>

    <input
        type="number"
        name="cost"
        id="cost"
        class="form-control @error('cost') is-invalid @enderror"
        value="{{ old('cost') }}"
        min="0"
        step="0.01"
        placeholder="0.00"
    >

    @error('cost')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

        {{-- Language --}}
<div class="mb-4">

    <label for="language" class="form-label fw-bold">
        Language
    </label>

    <select
        name="language_id"
        id="language"
        class="form-select"
    >

        <option value="">
            Select Language
        </option>

        @foreach($languages as $language)

            <option value="{{ $language->id }}">
                {{ $language->name }} ({{ $language->code }})
            </option>

        @endforeach

    </select>

</div>


        {{-- Learning Goals --}}
        <div class="mb-4">

            <label class="form-label fw-bold">
                Learning Goals
            </label>

            @foreach($learningGoals as $goal)

                <div class="form-check">

                    <input
                        type="checkbox"
                        name="learning_goals[]"
                        value="{{ $goal->id }}"
                        id="learning-goal-{{ $goal->id }}"
                        class="form-check-input"

                        @checked(
                            in_array(
                                $goal->id,
                                old('learning_goals', [])
                            )
                        )
                    >

                    <label
                        for="learning-goal-{{ $goal->id }}"
                        class="form-check-label"
                    >
                        {{ $goal->name }}
                    </label>

                </div>

            @endforeach

            @error('learning_goals')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Procurement Features --}}
        <div class="mb-4">

            <label class="form-label fw-bold">
                Procurement Features
            </label>

            @foreach($procurementFeatures as $feature)

                <div class="form-check">

                    <input
                        type="checkbox"
                        name="procurement_features[]"
                        value="{{ $feature->id }}"
                        id="procurement-feature-{{ $feature->id }}"
                        class="form-check-input"

                        @checked(
                            in_array(
                                $feature->id,
                                old('procurement_features', [])
                            )
                        )
                    >

                    <label
                        for="procurement-feature-{{ $feature->id }}"
                        class="form-check-label"
                    >
                        {{ $feature->name }}
                    </label>

                </div>

            @endforeach

            @error('procurement_features')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Form buttons --}}
        <button
            type="submit"
            class="btn btn-success"
        >
            Create
        </button>

        <a
            href="{{ route('content-catalogs.index') }}"
            class="btn btn-secondary"
        >
            Cancel
        </a>

    </form>

</div>

</body>
</html>