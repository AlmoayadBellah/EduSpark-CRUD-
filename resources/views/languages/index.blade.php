<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Languages</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Languages</h1>

        <a href="{{ route('languages.create') }}"
           class="btn btn-primary">
            Add Language
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($languages->count())

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

            @foreach($languages as $language)

                <tr>

                    <td>
                        {{ $language->id }}
                    </td>

                    <td>
                        {{ $language->code }}
                    </td>

                    <td>
                        {{ $language->name }}
                    </td>

                    <td>

                        <a
                            href="{{ route('languages.show', $language->id) }}"
                            class="btn btn-info btn-sm"
                        >
                            View
                        </a>

                        <a
                            href="{{ route('languages.edit', $language->id) }}"
                            class="btn btn-warning btn-sm"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('languages.destroy', $language->id) }}"
                            method="POST"
                            class="d-inline"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this language?')"
                            >
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
            No languages found.
        </div>

    @endif

</div>

</body>
</html>