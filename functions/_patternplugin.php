<?php

    register_block_pattern(
        'viktor-gutenberg-block-patterns/intro-two-columns',
        array(
            'title'   => __( 'Zelf gemaakt', 'viktor-gutenberg-block-patterns' ),
            'content' => "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":66.66} -->\n<div class=\"wp-block-column\" style=\"flex-basis:66.66%\"><!-- wp:paragraph {\"fontSize\":\"large\"} -->\n<p class=\"has-large-font-size\">Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":33.33} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
        )
    );
