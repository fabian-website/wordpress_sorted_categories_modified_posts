# WordPress: Get Categories sorted by modified posts

So, I had a project in WordPress where I have to display all categories of the page sorted by the last update of a post which belongs to a category.

For example:
 Category A consists of one post created yesterday; 
 Category B conststs of one post created today
 
 In this case B is before A. But if I edit the post of A, category A will be before B.
 
I tried a lot of stuff in the web which should do this, but it doesn't work, so I write an own function.

### Steps:

1. First put the code located in *code.php* in your *functions.php* of your theme
2. Then call the function *netthemes_sorted_categories()* in your template. So you can do something like this:

```
$categories = netthemes_sorted_categories();
foreach ( $categories as $category ) {
   echo $category->name;
}
```

This will display all category names sorted by its modified posts.

###### Hint:

In line 23 of the code.php you also display all categories which doesn't have posts. If you don't want to display them, just remove this part:

```
//Get all empty categories
$args_cat = array(
  'parent' => 0,
  'hide_empty' => FALSE,
  'orderby' => 'name'
);
$categories = get_categories( $args_cat );
foreach($categories as $category) {
   if($category->count == 0) {
      array_push($catarr, $category);
   }
}
```

If you've question or discover some issues, comment in the issue section.
