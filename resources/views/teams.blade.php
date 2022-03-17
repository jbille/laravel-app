<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Team Form</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ asset('css/team.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        @include('navigation')
        <div id="user_message">
            {!! $user_message ?? '' !!}
        </div>
        <div id="show_teams">
            @if (isset($teams_arr) && count($teams_arr) > 0)
            <table class="styleTable">
                <tr class="h">
                    <td>NAME</td>
                    <td>MASCOT</td>
                    <td>COLORS</td>
                    <td>EDIT</td>
                    <td>DELETE</td>
                </tr>
                @foreach ($teams_arr as $t)
                    <tr>
                        <td>{{ $t['name'] }}</td>
                        <td>{{ $t['mascot'] }}</td>
                        <td>{{ $t['colors'] }}</td>
                        <td><a href="/edit?id={{ $t['id'] }}">Edit Team</a></td>
                        <td><a href="/delete?id={{ $t['id'] }}">Delete Team</a></td>
                    </tr>
                @endforeach
            </table>
            @endif
        <div>
    </body>
</html>
