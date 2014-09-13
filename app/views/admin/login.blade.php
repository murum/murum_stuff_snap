
{{ Form::open() }}

<p>
{{ Form::text("username", null, ["placeholder" => "Username"]) }}
</p>

<p>
{{ Form::password("password", ["placeholder" => "Password"]) }}
</p>

<p>
{{ Form::submit() }}
</p>

{{ Form::close() }}
