<form class="search-form" action="<?php echo home_url('/'); ?>" method="get">
    <input class="search-field" type="text" name="s" id="search" placeholder="Search ..." value="<?php the_search_query(); ?>"/>
    <button class="search-submit" type="submit" alt="Search"><i class="icon ion-ios-search-strong"></i></button>
</form>
