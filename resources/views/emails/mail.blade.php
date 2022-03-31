<h1>Hello, {{$mail}}</h1>
<br>
<p>
    You have a shared collection from {{$from}}
</p>
<br>
@if(!empty($password))
    <h2>You can use {{$password}} as your password (and your mail)</h2>
@endif
