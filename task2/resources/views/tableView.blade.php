<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table View</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Table with Sorting and Pagination</h1>
    <table id="myTable">
        <thead>
            <tr>
                <th><a href="{{ url()->current() . '?sortColumn=name&sortDirection=' . ($sortDirection === 'asc' ? 'desc' : 'asc') }}">Name</a></th>
                <th><a href="{{ url()->current() . '?sortColumn=age&sortDirection=' . ($sortDirection === 'asc' ? 'desc' : 'asc') }}">Age</a></th>
                <th><a href="{{ url()->current() . '?sortColumn=country&sortDirection=' . ($sortDirection === 'asc' ? 'desc' : 'asc') }}">Country</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row['name'] }}</td>
                    <td>{{ $row['age'] }}</td>
                    <td>{{ $row['country'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        @if ($currentPage > 1)
            <a href="{{ url()->current() . '?page=' . ($currentPage - 1) . '&sortColumn=' . $sortColumn . '&sortDirection=' . $sortDirection }}">Prev</a>
        @endif
        <span>Page {{ $currentPage }} of {{ ceil($total / $perPage) }}</span>
        @if ($currentPage < ceil($total / $perPage))
            <a href="{{ url()->current() . '?page=' . ($currentPage + 1) . '&sortColumn=' . $sortColumn . '&sortDirection=' . $sortDirection }}">Next</a>
        @endif
    </div>
</body>
</html>
