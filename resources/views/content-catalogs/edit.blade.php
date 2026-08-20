<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Content Catalog</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Edit Content Catalog</h1>

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
        action="{{ route('content-catalogs.update', $contentCatalog->id) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-3">

            <label for="title" class="form-label">
                Title
            </label>

            <input
                type="text"
                name="title"
                id="title"
                class="form-control"
                value="{{ old('title', $contentCatalog->title) }}"
            >

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
                class="form-control"
            >{{ old('description', $contentCatalog->description) }}</textarea>

        </div>


        {{-- Languages --}}
        <div class="mb-4">

            <label class="form-label fw-bold">
                Languages
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
                            $contentCatalog->learningGoals->contains(
                                'id',
                                $goal->id
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
                            $contentCatalog->procurementFeatures->contains(
                                'id',
                                $feature->id
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

        </div>


        {{-- Form buttons --}}
        <button
            type="submit"
            class="btn btn-primary"
        >
            Update
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