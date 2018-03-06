<?php

/**
 * @file
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependent to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 *
 * @ingroup themeable
 */
?>
<?php
$search_form = drupal_get_form('search_form', NULL, get_current_search_terms(), 'node');
$search_form['basic']['keys']['#attributes']['class'] = array('reply-form__name');
$search_form['advanced']['submit']['#attributes']['class'] = array('btn btn-success');


$search_form['#attributes'] = array('class' => 'full_search');
$search_box = drupal_render($search_form);
?>
<?php print($search_box); ?>
<?php if ($search_results): ?>
	<h2><?php print t('Search results');?></h2>
	<ol class="search-results <?php print $module; ?>-results">
		<?php print $search_results; ?>
	</ol>
	<?php print $pager; ?>
<?php else : ?>
	<h2><?php print t('Your search yielded no results');?></h2>
	<?php print search_help('search#noresults', drupal_help_arg()); ?>
<?php endif; ?>
