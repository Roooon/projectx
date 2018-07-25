@if (Auth::id() != $user->id)
    @else
        <a href="{{ route('profile.editselfintro', ['id' => $user->id]) }}">編集</a>
@endif

            <ul class="self-intro">
                <div class="date-of-birth">生年月日 : {{ $profile[0]->birthdate }}</div>
                <div class="hobby">趣味 : {{ $profile[0]->hobby }}</div>
                <div class="message">一言 : {{ $profile[0]->appeal }}</div>
            </ul>
