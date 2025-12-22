<?php
if (!defined('ABSPATH')) {
    exit;
}

get_template_part('parts/header');

if (have_posts()):
    while (have_posts()):
        the_post();
        ?>
        <main class="min-h-screen w-full mt-24 flex justify-center">
            <div class="w-full max-w-4xl p-9 flex flex-col gap-12 items-center text-center">

                <div class="rounded-full overflow-hidden w-[20rem] h-[20rem]">
                    <?php the_post_thumbnail('medium', [
                        'class' => 'w-full h-full object-cover'
                    ]); ?>
                </div>

                <section class="prose prose-center max-w-none prose-p:text-justify hyphens-auto">
                    <h3 class="mb-5"><?php the_title(); ?></h3>
                    <?php the_content(); ?>

                    <?php
                    $link_sito = get_field('link_sito');
                    $pdf_id = get_field('pdf_id');
                    $has_both = $link_sito && $pdf_id;

                    $link_styles = 'text-blue hover:text-red text-2xl font-semibold tracking-wide';
                    $dot_styles = 'text-blue text-2xl font-semibold px-4';

                    if ($link_sito) {
                        echo '<a href="' . esc_url($link_sito) . '" target="_blank" rel="noopener">
                        <span class="' . esc_attr($link_styles) . '">PORTFOLIO</span></a>';
                    }

                    if ($has_both) {
                        echo '<span class="' . esc_attr($dot_styles) . '">•</span>';
                    }

                    if ($pdf_id) {
                        $pdf_url = wp_get_attachment_url($pdf_id);
                        echo '<a href="' . esc_url($pdf_url) . '" target="_blank" rel="noopener">
                        <span class="' . esc_attr($link_styles) . '">SCARICA PORTFOLIO (PDF)</span></a>';
                    }
                    ?>
                </section>
            </div>
        </main>


        <?php
    endwhile;
endif;

get_template_part('parts/footer');
