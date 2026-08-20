<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Content Catalogs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h1>Content Catalogs</h1>

            <a href="{{ route('content-catalogs.create') }}" class="btn btn-primary">
                Add Content Catalog
            </a>

        </div>


        {{-- Show success message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        @if ($contentCatalogs->count())

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>
                        <th>Description</th>
                        <th>Languages</th>
                        <th>Learning Goals</th>
                        <th>Procurement Features</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($contentCatalogs as $contentCatalog)
                        <tr>

                            {{-- Basic information --}}


                            <td>
                                {{ $contentCatalog->short_description }}
                            </td>


                            {{-- Languages --}}

                            <td>
                                @if ($contentCatalog->language)
                                    <span class="badge bg-primary">
                                        {{ $contentCatalog->language->name }}
                                    </span>
                                @else
                                    <span class="text-muted">None</span>
                                @endif
                            </td>


                            {{-- Learning Goals --}}
                            <td>

                                @forelse($contentCatalog->learningGoals as $goal)
                                    <span class="badge bg-success">
                                        {{ $goal->name }}
                                    </span>

                                @empty

                                    <span class="text-muted">
                                        None
                                    </span>
                                @endforelse

                            </td>


                            {{-- Procurement Features --}}
                            <td>

                                @forelse($contentCatalog->procurementFeatures as $feature)
                                    <span class="badge bg-warning text-dark">
                                        {{ $feature->name }}
                                    </span>

                                @empty

                                    <span class="text-muted">
                                        None
                                    </span>
                                @endforelse

                            </td>


                            {{-- Actions --}}
                            <td>

                                <a href="{{ route('content-catalogs.show', $contentCatalog->id) }}"
                                    class="btn btn-info btn-sm">
                                    View
                                </a>

                                <a href="{{ route('content-catalogs.edit', $contentCatalog->id) }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('content-catalogs.destroy', $contentCatalog->id) }}"
                                    method="POST" class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
        @else
            <div class="alert alert-info">
                No content catalogs found.
            </div>

        @endif

    </div>

</body>

</html>
