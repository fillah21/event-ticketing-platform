{{-- @extends('layouts.app')

@section('content')

@endsection --}}

<h1>Create Event</h1>

<form method="POST" action="{{ route('events.store') }}">
    @csrf

    <div>
        <label for="organization_id">Organization</label>
        <input type="number" name="organization_id" id="organization_id">
    </div>

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>

    <div>
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug">
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <div>
        <label for="starts_at">Starts At</label>
        <input type="datetime-local" name="starts_at" id="starts_at">
    </div>

    <div>
        <label for="ends_at">Ends At</label>
        <input type="datetime-local" name="ends_at" id="ends_at">
    </div>

    <button type="submit">Create Event</button>
</form>