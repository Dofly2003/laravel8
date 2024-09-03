<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Slider</title>
</head>
<body>
    <form action="{{ route('testZone.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Name Image:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $slider->name) }}" required>

        <label for="img">Upload New Image (optional):</label>
        <input type="file" id="img" name="img">

        <label for="is_publish">Publish:</label>
        <input type="checkbox" id="is_publish" name="is_publish" {{ $slider->is_publish ? 'checked' : '' }}>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('testZone.index') }}">Back to List</a>
</body>
</html>
