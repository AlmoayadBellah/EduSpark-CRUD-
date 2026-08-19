<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Language Details</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Language Details</h1>

    <div class="card">

        <div class="card-body">

            <p>
                <strong>ID:</strong>
                {{ $language->id }}
            </p>

            <p>
                <strong>Code:</strong>
                {{ $language->code }}
            </p>

            <p>
                <strong>Name:</strong>
                {{ $language->name }}
            </p>

            <p>
                <strong>Created:</strong>
                {{ $language->created_at }}
            </p>

            <p>
                <strong>Updated:</strong>
                {{ $language->updated_at }}
            </p>

            <a
                href="{{ route('languages.edit', $language->id) }}"
                class="btn btn-warning"
            >
                Edit
            </a>

            <a
                href="{{ route('languages.index') }}"
                class="btn btn-secondary"
            >
                Back
            </a>

        </div>

    </div>

</div>

</body>
</html>