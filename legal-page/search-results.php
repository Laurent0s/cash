<section class="legal-page-search-results hidden" id="section__search__results">
    <?php
    set_query_var('main-black-heading', __('Legal-search-results-heading', 'Cash-Theme'));
    set_query_var('main-gray-heading', ' ');
    get_template_part('/heading');
    ?>

    <p class="search-results-not-available hidden" data-search-message><?php _e('Legal-page-unavailable','Cash-Theme')?></p>
    <p class="search-results-not-found hidden" data-search-message><?php _e('Legal-page-not-found','Cash-Theme')?></p>

    <ul class="info__list docs__list" id="search-results">

    </ul>

    <li class="info__item download__item hidden">
        <p class="item__text">
            Default Item
        </p>
        <div class="download">
            <a href="#" class="download__label"><?php _e('Legal-page-download','Cash-Theme')?></a>
            <div class="download-icon"></div>
        </div>
    </li>

    <li class="info__item docs__item hidden">
        <p class="item__text title-text">
            Default Item
        </p>
        <div class="plus"></div>
    </li>
    <div class="text-block hidden" data-element="content-text-block">
        <p class="item__text content-text">Content</p>
    </div>

    <li class="info__item no-name__item hidden">
        <p class="item__text"></p>
    </li>
</section>