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
            {{ $user_message }}
            @if ($new_record === true && $record_save === true)
                <span>Team successfully added!</span>
            @elseif ($new_record === true && $record_save === false)
                <span class="error">There was an error adding your team.</span>
            @endif
        </div>
    </body>
</html>
