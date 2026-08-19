<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Content Catalog Details</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Content Catalog Details</h1>

    <div class="card">

        <div class="card-body">

            {{-- Basic information --}}
            <h4>{{ $contentCatalog->title }}</h4>

            <p>
                {{ $contentCatalog->description }}
            </p>


            {{-- Languages --}}
            <div class="mb-3">

                <h5>Languages</h5>

                @forelse($contentCatalog->languages as $language)

                    <span class="badge bg-primary me-1">
                        {{ $language->name }}
                    </span>

                @empty

                    <span class="text-muted">
                        No languages assigned.
                    </span>

                @endforelse

            </div>


            {{-- Learning Goals --}}
            <div class="mb-3">

                <h5>Learning Goals</h5>

                @forelse($contentCatalog->learningGoals as $goal)

                    <span class="badge bg-success me-1">
                        {{ $goal->name }}
                    </span>

                @empty

                    <span class="text-muted">
                        No learning goals assigned.
                    </span>

                @endforelse

            </div>


            {{-- Procurement Features --}}
            <div class="mb-3">

                <h5>Procurement Features</h5>

                @forelse($contentCatalog->procurementFeatures as $feature)

                    <span class="badge bg-warning text-dark me-1">
                        {{ $feature->name }}
                    </span>

                @empty

                    <span class="text-muted">
                        No procurement features assigned.
                    </span>

                @endforelse

            </div>


            {{-- Action buttons --}}
            <a
                href="{{ route('content-catalogs.edit', $contentCatalog->id) }}"
                class="btn btn-warning"
            >
                Edit
            </a>

            <a
                href="{{ route('content-catalogs.index') }}"
                class="btn btn-secondary"
            >
                Back
            </a>

        </div>

    </div>

</div>

</body>
</html>