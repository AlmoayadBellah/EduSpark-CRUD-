<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procurement Feature Details</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Procurement Feature Details</h1>

    <div class="card">

        <div class="card-body">

            <h5 class="card-title">
                {{ $procurementFeature->name }}
            </h5>

            <p class="card-text">
                <strong>ID:</strong>
                {{ $procurementFeature->id }}
            </p>

            <p class="card-text">
                <strong>Name:</strong>
                {{ $procurementFeature->name }}
            </p>

            <a
                href="{{ route('procurement-features.edit', $procurementFeature) }}"
                class="btn btn-warning"
            >
                Edit
            </a>

            <a
                href="{{ route('procurement-features.index') }}"
                class="btn btn-secondary"
            >
                Back
            </a>

        </div>

    </div>

</div>

</body>
</html>