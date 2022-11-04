<?php
/**
 * Searchform
 *
 * Custom template for search form
 */
?>
<!-- BEGIN of search form -->
<form method="get" id="searchform" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">

    <input type="search" name="s" id="s" class="search-field pos-rel" placeholder="Search"
           value="<?php echo get_search_query(); ?>"/>
    <button type="submit">
        <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M15.2727 8.8C15.2727 12.2715 12.4236 15.0857 8.90909 15.0857C5.39455 15.0857 2.54545 12.2715 2.54545 8.8C2.54545 5.3285 5.39455 2.51429 8.90909 2.51429C12.4236 2.51429 15.2727 5.3285 15.2727 8.8ZM13.4833 16.3531C12.1462 17.1449 10.5815 17.6 8.90909 17.6C3.98874 17.6 0 13.6601 0 8.8C0 3.93989 3.98874 0 8.90909 0C13.8294 0 17.8182 3.93989 17.8182 8.8C17.8182 11.0976 16.9268 13.1895 15.4669 14.7567L20.6272 19.8539C21.1243 20.3449 21.1243 21.1409 20.6272 21.6318C20.1302 22.1227 19.3243 22.1227 18.8273 21.6318L13.4833 16.3531Z"
                  fill="#83303A"/>
        </svg>
    </button>

</form>
<!-- END of search form -->
