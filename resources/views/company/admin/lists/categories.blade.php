<option selected>اختر التصنيف المناسب</option>
@if (isset($project)) {{-- في حال انه غير معرف --}}
    @foreach($categories as $category)
    <option value="{{$category->id}}"> {{$category->title}}</option>
    @endforeach
@endif
