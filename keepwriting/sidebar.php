    <ul class="sidebar">
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('bottomsection') ) : else : ?>
    <p>Please configure this section through Widgets</p>        
    <?php endif; ?>
    </ul>