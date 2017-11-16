<h1>Messages</h1>

@foreach ($messages as $message)
    <hr>
    <p>{{ $message->full_name}}</p>
    <p>{{ $message->email}}</p>
    <p>{{ $message->telephone}}</p>
    <p>{{ $message->description}}</p>
@endforeach
<hr>