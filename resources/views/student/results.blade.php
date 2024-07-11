<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
</head>
<body>
<h1>Your Results</h1>
<table>
    <thead>
    <tr>
        <th>Subject</th>
        <th>Exam Date</th>
        <th>Score</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($results as $result)
        <tr>
            <td>{{ $result->subject->name }}</td>
            <td>{{ $result->exam->exam_date }}</td>
            <td>{{ $result->score }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
</body>
</html>
