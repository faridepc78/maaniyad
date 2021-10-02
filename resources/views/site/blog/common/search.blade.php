<section class="widget widget_search">
    <form class="search-form" action="{{route('blog.search')}}" method="get">
        <label>
            <span class="screen-reader-text">جستجو:</span>
            <input name="search" value="{{request()->input('search')}}" onkeyup="this.value=removeSpaces(this.value)" type="search"
                   class="search-field" placeholder="جستجو ...">
        </label>
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</section>
