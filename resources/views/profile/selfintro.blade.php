@if (Auth::user()->id != $user->id)
            @if(isset($user->profile))
            <ul class="self-intro">
                <div class="date-of-birth">生年月日 : {{ $user->profile->birthdate }}</div>
                <div class="hobby">趣味 : {{ $user->profile->hobby }}</div>
                <div class="message">一言 : {{ $user->profile->appeal }}</div>
            
            <a href="{{ route('profile.editselfintro', ['id' => $user->id]) }}">編集</a>
            </ul>
            @else
            
             自己紹介を書いてね
             
             @endif
@else 
 <!--<a href="{{ route('profile.editselfintro', ['id' => $user->id]) }}">編集</a>-->

            @if(isset($user->profile))
            <ul class="self-intro">
                <div class="date-of-birth">生年月日 : {{ $user->profile->birthdate }}</div>
                <div class="hobby">趣味 : {{ $user->profile->hobby }}</div>
                <div class="message">一言 : {{ $user->profile->appeal }}</div>
            
            <a href="{{ route('profile.editselfintro', ['id' => $user->id]) }}">編集</a>
            </ul>
            @else
            
             自己紹介を書いてね
             
        <a href="{{ route('profile.editselfintro', ['id' => $user->id]) }}">編集</a>
             @endif

@endif