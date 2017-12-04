<?php
/**
 * @file
 * The primary PHP file for this theme.
 */


// load scripts
function edidaktikum_theme_bs3_preprocess_html(&$variables) {
	
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

function edidaktikum_theme_bs3_menu_tree__primary($variables) {
	
	
	return '<ul class="main-nav__list">' . $variables['tree'] . '</ul>';
	
}

function edidaktikum_theme_bs3_menu_tree__secondary($variables) {

	
	return $variables['tree'] ;
	
}

/**
 * Implements theme_menu_link()
 */
function edidaktikum_theme_bs3_menu_link(array $variables) {

	$element = $variables['element'];

	if($element['#original_link']['menu_name'] == 'user-menu'){
	
		if($element['#href'] == 'faq'){
			$output = '<a class="contact-block-01__email faq" href="'.$element['#href'].'">'.$element['#title'].'</a>';
		}else if($element['#href'] == 'user'){
			$output = '<a class="contact-block-01__email user" href="'.$element['#href'].'">'.$element['#title'].'</a>';
		}else if($element['#href'] == 'user/logout'){
			$output = '<a class="contact-block-01__email logout" href="'.$element['#href'].'">'.$element['#title'].'</a>';
		} else if($element['#href'] == 'user/login'){
			$output = '<a class="contact-block-01__email login" href="'.$element['#href'].'">'.$element['#title'].'</a>';
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