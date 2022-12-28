<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project Manager</title>
    </head>
    <body>
        <h4>Project Bank</h4>
        <table>
            @forelse ($projects as $project)
            <tr>
                <td> {{ $project->name }}</td>
                <td> {{ $project->execution_date }}</td>
            </tr>
            @empty
            <tr>
                <td>
                    <p>No projects yet</p>
                </td>
            </tr>
            @endforelse
        </table>
    </body>
</html>
