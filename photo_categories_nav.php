<?php
$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
$result = array_pop(explode("/", trim($path, "/"))); // достаём категорию из url

$term = get_term_by('slug', $result, 'media_category');

$current = wpm_get_language();
?>

<h3 class="page_title"><?php echo $term->name; ?></h3>
<div class="categories_navigation">

  <?php
  $args = array(
    'orderby' => 'date',
    'order' => 'asc',
    'exclude' => '31'
  );
  $cats = get_terms('media_category', $args);
  foreach ($cats as $cat) {
    if ($result === $cat->slug) {
      echo '<a class="categories_navigation_link selected">' . $cat->name . '</a>';
    } else {
      echo '<a href="' . $current . '/portfolio/' . $cat->slug . '" class="categories_navigation_link">' . $cat->name . '</a>';
    }

  }
  ?>
</div>