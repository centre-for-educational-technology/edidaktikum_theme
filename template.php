<?php
/**
 * @file
 * The primary PHP file for this theme.
 */


// load scripts
function edidaktikum_theme_bs3_preprocess_html(&$variables) {

	
	//$variables['page']['header']['menu_ed-dashboard-menu'];
	
	if (drupal_is_front_page()) {
		$variables['classes_array'][] = 'home-02 home';
	}else{
		$variables['classes_array'][] = 'page';
	}
	
	$options = array(
			'group' => JS_THEME,
	);

	//drupal_add_js(drupal_get_path('theme', 'edidaktikum_theme_bs3') . '/scripts/main.js', array('type'=>'file', 'group'=>JS_THEME));

 drupal_add_js(drupal_get_path('theme', 'edidaktikum_theme_bs3') . '/scripts/main.js', array('type' => 'file', 'scope' => 'footer'));
	

}


function edidaktikum_theme_bs3_menu_tree__ed_dashboard_menu($variables){
	return '<div class="container"><ul class="nav nav-tabs">' . $variables['tree'] . '</ul></div>';
}

function edidaktikum_theme_bs3_menu_tree__primary($variables) {
	
	
	return '<ul class="main-nav__list">' . $variables['tree'] . '</ul>';
	
}

function edidaktikum_theme_bs3_menu_tree__secondary($variables) {

	
	return $variables['tree'] ;
	
}

function edidaktikum_theme_bs3_pager($variables){
	$output = "";
	$items = array();
	$tags = $variables['tags'];
	$element = $variables['element'];
	$parameters = $variables['parameters'];
	$quantity = $variables['quantity'];
	
	global $pager_page_array, $pager_total;
	
	// Calculate various markers within this pager piece:
	// Middle is used to "center" pages around the current page.
	$pager_middle = ceil($quantity / 2);
	// Current is the page we are currently paged to.
	$pager_current = $pager_page_array[$element] + 1;
	// First is the first page listed by this pager piece (re quantity).
	$pager_first = $pager_current - $pager_middle + 1;
	// Last is the last page listed by this pager piece (re quantity).
	$pager_last = $pager_current + $quantity - $pager_middle;
	// Max is the maximum page number.
	$pager_max = $pager_total[$element];
	
	// Prepare for generation loop.
	$i = $pager_first;
	if ($pager_last > $pager_max) {
		// Adjust "center" if at end of query.
		$i = $i + ($pager_max - $pager_last);
		$pager_last = $pager_max;
	}
	if ($i <= 0) {
		// Adjust "center" if at start of query.
		$pager_last = $pager_last + (1 - $i);
		$i = 1;
	}
	
	// End of generation loop preparation.
	$li_first = theme('pager_first', array(
			'text' => (isset($tags[0]) ? $tags[0] : t('first')),
			'element' => $element,
			'parameters' => $parameters,
	));
	$li_previous = theme('pager_previous', array(
			'text' => (isset($tags[1]) ? $tags[1] : t('previous')),
			'element' => $element,
			'interval' => 1,
			'parameters' => $parameters,
	));
	$li_next = theme('pager_next', array(
			'text' => (isset($tags[3]) ? $tags[3] : t('next')),
			'element' => $element,
			'interval' => 1,
			'parameters' => $parameters,
	));
	$li_last = theme('pager_last', array(
			'text' => (isset($tags[4]) ? $tags[4] : t('last')),
			'element' => $element,
			'parameters' => $parameters,
	));
	if ($pager_total[$element] > 1) {
		
		// Only show "first" link if set on components' theme setting
		if ($li_first && bootstrap_setting('pager_first_and_last')) {
			$items[] = array(
					'class' => array('pager-first'),
					'data' => $li_first,
			);
		}
		if ($li_previous) {
			$items[] = array(
					'class' => array('prev'),
					'data' => $li_previous,
			);
		}
		// When there is more than one page, create the pager list.
		if ($i != $pager_max) {
			if ($i > 1) {
				$items[] = array(
						'class' => array('pager-ellipsis', 'disabled'),
						'data' => '<span>…</span>',
				);
			}
			// Now generate the actual pager piece.
			for (; $i <= $pager_last && $i <= $pager_max; $i++) {
				if ($i < $pager_current) {
					$items[] = array(
						// 'class' => array('pager-item'),
							'data' => theme('pager_previous', array(
									'text' => $i,
									'element' => $element,
									'interval' => ($pager_current - $i),
									'parameters' => $parameters,
							)),
					);
				}
				if ($i == $pager_current) {
					$items[] = array(
						// Add the active class.
							'class' => array('active'),
							'data' => "<a href='#'><span>$i</span></a>",
					);
				}
				if ($i > $pager_current) {
					$items[] = array(
							'data' => theme('pager_next', array(
									'text' => $i,
									'element' => $element,
									'interval' => ($i - $pager_current),
									'parameters' => $parameters,
							)),
					);
				}
			}
			if ($i < $pager_max) {
				$items[] = array(
						'class' => array('pager-ellipsis', 'disabled'),
						'data' => '<span>…</span>',
				);
			}
		}
		// End generation.
		if ($li_next) {
			$items[] = array(
					'class' => array('next'),
					'data' => $li_next,
			);
		}
		// // Only show "last" link if set on components' theme setting
		if ($li_last && bootstrap_setting('pager_first_and_last')) {
			$items[] = array(
					'class' => array('pager-last'),
					'data' => $li_last,
			);
		}
		
		$build = array(
				'#theme_wrappers' => array('container__pager'),
				'#attributes' => array(
						'class' => array(
								'text-center',
						),
				),
				'pager' => array(
						'#theme' => 'item_list',
						'#items' => $items,
						'#attributes' => array(
								'class' => array('pagination-list'),
						),
				),
		);
		return drupal_render($build);
	}
	return $output;
}


/**
 * Implements theme_menu_link()
 */
function edidaktikum_theme_bs3_menu_link(array $variables) {

	$element = $variables['element'];

	if($element['#original_link']['menu_name'] == 'user-menu'){
		
		if($element['#href'] == 'faq'){
			$output = l($element['#title'], $element['#href'], array('attributes' => array('class' => array('contact-block-01__email', 'faq'))));
		}else if($element['#href'] == 'user'){
			$output = l($element['#title'], $element['#href'], array('attributes' => array('class' => array('contact-block-01__email', 'user'))));
		}else if($element['#href'] == 'user/logout'){
			$output = l($element['#title'], $element['#href'], array('attributes' => array('class' => array('contact-block-01__email', 'logout'))));
		} else if($element['#href'] == 'user/login'){
			$output = l($element['#title'], $element['#href'], array('attributes' => array('class' => array('contact-block-01__email', 'login'))));
		}else if($element['#href'] == 'privacy'){
			$output = l($element['#title'], $element['#href'], array('attributes' => array('class' => array('contact-block-01__email', 'privacy'))));
		}
	
		return $output;

	}else{
		
		$sub_menu = '';
		
		if ($element['#below']) {
			$sub_menu = drupal_render($element['#below']);
		}
		$output = l($element['#title'], $element['#href'], $element['#localized_options']);
		
		return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
	}
}


/**
 * Implements hook_preprocess_page().
 */
function edidaktikum_theme_bs3_preprocess_page(&$vars) {
	
	$page = $vars['page'];
	$vars['navbar_languages'] = FALSE;
	if (module_exists('locale')) {
		$languages_block = module_invoke('locale', 'block_view', 'language');
		$vars['navbar_languages'] = $languages_block['content'];
	}
	
	
	$system_languages = locale_language_list();
	
	$other_languages = array();
	
	foreach($system_languages as $key => $system_language){
		if($vars['language']->language != $key){
			if(!in_array([$key => $system_language], $other_languages)){
				array_push($other_languages, ['name' => $key,'value' => $system_language]);
			}
			
		}
	}
	
	$vars['other_languages'] = $other_languages;
	//kpr($other_languages);
	
	
	$search_form = drupal_get_form('search_form');
	$search_box = drupal_render($search_form);
	$vars['search_box'] = $search_box;
	
	
	// Breadcrumbs are not displayed
	$vars['breadcrumb'] = FALSE;
	
	
	$site_frontpage = variable_get('site_frontpage', 'node');
	
	$vars['site_frontpage'] = $site_frontpage;
	
	
	$contacts_text = variable_get('ed_contact_page_contacts_text', '');
	if (is_array($contacts_text)) {
		$contacts_text = check_markup($contacts_text['value'], $contacts_text['format']);
	}
	
	$vars['contacts_text'] = $contacts_text;
	
	
	$logos_text = variable_get('ed_contact_page_logos_text', '');
	if (is_array($logos_text)) {
		$logos_text = check_markup($logos_text['value'], $logos_text['format']);
	}
	
	
	
	if (drupal_is_front_page()) {
		$vars['logos_text'] = $logos_text;
		
		
		
		$vars['students_count'] = get_student_qt();
		
		$vars['teachers_count'] = get_teacher_qt();
		
		$vars['groups_count'] = get_cluster_qt();
		
		$vars['res_count'] = get_lr_qt();
		
		$vars['tasks_count'] = get_task_qt();
		
		
		$vars['what_text'] = variable_get('ed_home_page_what_text')? variable_get('ed_home_page_what_text') : 'No text found';
		
		$vars['dashboard_text'] = variable_get('ed_home_page_dashboard_text')? variable_get('ed_home_page_dashboard_text') : 'No text found';
		
		$vars['groups_text'] = variable_get('ed_home_page_groups_text')? variable_get('ed_home_page_groups_text') : 'No text found';
		
		$vars['collections_text'] = variable_get('ed_home_page_collections_text')? variable_get('ed_home_page_collections_text') : 'No text found';
		
	}

	
}


/*
 *  Form alter to add missing bootstrap classes and role to search form.
 */

function edidaktikum_theme_bs3_form_alter(&$form, &$form_state, $form_id) {
	if ($form_id == 'search_form') {
		$form['#attributes']['class'] = 'search-block__form';
	}
}


function edidaktikum_theme_bs3_bootstrap_search_form_wrapper($variables) {
	
	
	$output = $variables['element']['#children'];
	
	return $output;
}


function get_student_qt(){
	$query = db_select('users', 'u');
	$query->leftJoin('users_roles', 'ur', 'ur.uid = u.uid');
	$query->leftJoin('role', 'r', 'r.rid = ur.rid');
	$query->fields('u', array('uid'))
			->condition('u.uid', 0, '!=')
			->isNull('r.name');
	
	return $query->countQuery()->execute()->fetchField();
}

function get_teacher_qt(){
	$query = db_select('users', 'u');
	$query->join('users_roles', 'ur', 'ur.uid = u.uid');
	$query->join('role', 'r', 'r.rid = ur.rid');
	$query->condition('r.name' , 'teacher');
	$query->fields('u',array('uid'));
	
	return $query->countQuery()->execute()->fetchField();
}

function get_task_qt(){
	$query = db_select('node', 'n')
			->fields('n', array('nid'))
			->condition('type', 'ed_task');
	
	return $query->countQuery()->execute()->fetchField();
}

function get_lr_qt(){
	$query = db_select('node', 'n')
			->fields('n', array('nid'))
			->condition('type', 'ed_learning_resource');
	
	return $query->countQuery()->execute()->fetchField();
}

function get_cluster_qt(){
	$query = db_select('node', 'n')
			->fields('n', array('nid'))
			->condition('type', 'ed_cluster');
	
	return $query->countQuery()->execute()->fetchField();
}

function edidaktikum_theme_bs3_menu_link_alter(&$link) {
	
	if ($link['link_path'] == 'contact') {
		$link['hidden'] = 1;
	}
}


/**
 * Implements template_preprocess_search_result().
 */
function edidaktikum_theme_bs3_preprocess_search_result(&$variables) {
	if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
		global $pager_limits;
		$variables['attributes_array']['value'] = ((int)$_GET['page'] * $pager_limits[0]) + $variables['id'];
	}
}


function edidaktikum_theme_bs3_preprocess_field(&$variables) {
	if($variables['element']['#field_name'] == 'ed_field_category') {
		$variables['classes_array'][] = 'categories-list';
	}
}

function edidaktikum_theme_bs3_textarea($variables) {
	$element = $variables ['element'];
	element_set_attributes($element, array('id', 'name', 'cols', 'rows'));
	_form_set_class($element, array('form-textarea'));
	
	$wrapper_attributes = array(
			'class' => array('form-textarea-wrapper'),
	);
	
	$output = '<div' . drupal_attributes($wrapper_attributes) . '>';
	$output .= '<textarea' . drupal_attributes($element ['#attributes']) . '>' . check_plain($element ['#value']) . '</textarea>';
	$output .= '</div>';
	return $output;
}

function edidaktikum_theme_bs3_form_comment_form_alter(&$form, &$form_state) {

	
	$form['comment_body'][LANGUAGE_NONE][0]['#attributes']['class'][] = 'reply-form__message';
	$form['subject']['#attributes']['class'][] = 'reply-form__topic';
	
//	kpr($form);
}

//
//function edidaktikum_theme_bs3_preprocess_comment_wrapper(&$variables) {
//
//
////	$variables['classes_array'][] = 'reply-form';
////	$variables['content']['comment_form']['comment_body']['#attributes']['class'][] = 'reply-form__message';
////
//	kpr($variables);
//
////	$comment_form = drupal_render_children($variables['form']);
////
////	return $comment_form;
//
////	if ($variables['content']) {
////		$variables['content'] = '<div id="comment-head"><div  id="postnew"><a href="#commentform" name="commentlist" title="Post  a comment"></a></div></div>'.  $vars['content'];
////	}
//
//}

//function edidaktikum_theme_bs3_comment_block() {
//	kpr('hello');
//	$items = array();
//	$number = variable_get('comment_block_count', 10);
//	foreach (comment_get_recent($number) as $comment) {
//		$items[] = l($comment->subject, 'comment/' . $comment->cid, array('fragment' => 'comment-' . $comment->cid)) . '&nbsp;<span>' . t('@time ago', array('@time' => format_interval(REQUEST_TIME - $comment->changed))) . '</span>';
//	}
//	if ($items) {
//		return theme('item_list', array('items' => $items));
//	}
//	else {
//		return t('No comments available.');
//	}
//}