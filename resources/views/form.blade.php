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
        <div id="add_team">
        @if (isset($team_info) && $team_info['id'])
            <form id="team_form" action="/update">
                <input type="hidden" name="id" value="{{ $team_info['id'] }}">
        @else
            <form id="team_form" action="/store">
        @endif
                <input type="hidden" name="save" value="1">
                <div class="field_container">
                    <input type="text" name="name" value="{{ $team_info['name'] ?? "" }}" placeholder="Team Name">
                </div>
                <div class="field_container">
                    <input type="text" name="mascot" value="{{ $team_info['mascot'] ?? "" }}" placeholder="Team Mascot">
                </div>
                <div class="field_container">
                    <input type="text" name="colors" value="{{ $team_info['colors'] ?? "" }}" placeholder="Team Colors">
                </div>
                <div class="field_container">
                    <button id="submit_button">
                        <span class="button_text">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>
