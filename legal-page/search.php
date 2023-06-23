<section class="info-search__block">
	<?php
	set_query_var('main-black-heading', __('Legal-search-heading','Cash-Theme'));
	set_query_var('main-gray-heading', __('legal-search-heading-gray','Cash-Theme'));
	get_template_part('/heading');
	get_search_form(); ?>
</section>