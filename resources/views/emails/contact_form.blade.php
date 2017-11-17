<p>You have a new message!</p>
<p>From: {{$contactMessage->full_name}}</p>
<p>Email: {{$contactMessage->email}}</p>
<p>Telephone: {{$contactMessage->telephone}}</p>
<p>Message:</p>
<div>
    <p>{{$contactMessage->description}}</p>
</div>