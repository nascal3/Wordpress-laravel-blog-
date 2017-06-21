@if(isset($categoryName))
    <h3>Category: {{$categoryName}}</h3>
@endif

@if(isset($tagName))
    <h3>Tag: {{$tagName}}</h3>
@endif


@if(isset($userName))
    <h3>Author: {{$userName}}</h3>
@endif

@if($term = request('term'))
    <h3>Search results for : {{$term}}</h3>
@endif