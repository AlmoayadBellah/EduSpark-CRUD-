<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Goals</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Learning Goals</h1>

        <a
            href="{{ route('learning-goals.create') }}"
            class="btn btn-primary"
        >
            Add Learning Goal
        </a>
    </div>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($learningGoals as $learningGoal)

                <tr>
                    <td>{{ $learningGoal->id }}</td>

                    <td>{{ $learningGoal->name }}</td>

                    <td>

                        <a
                            href="{{ route('learning-goals.show', $learningGoal) }}"
                            class="btn btn-info btn-sm"
                        >
                            View
                        </a>

                        <a
                            href="{{ route('learning-goals.edit', $learningGoal) }}"
                            class="btn btn-warning btn-sm"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('learning-goals.destroy', $learningGoal) }}"
                            method="POST"
                            class="d-inline"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this learning goal?')"
                            >
                                Delete
                            </button>

                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="3" class="text-center">
                        No learning goals found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>