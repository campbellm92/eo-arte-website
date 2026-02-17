<?php

if (!defined('ABSPATH'))
    exit;

$args = [
    'post_type' => 'artist',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
];
$artists = new WP_Query($args);
?>


<?php
get_template_part('parts/header');
?>

<main class="min-h-screen pt-[9rem] text-center md:text-left">
    <section class="p-9 w-full md:max-w-10/12">
        <h1 class="pb-5">COLLETTIVO</h1>
        <p>Il collettivo di EO ARTE è il motore vivo dello spazio: cura, produce e attiva relazioni intorno
            all’arte
            contemporanea. Ogni persona del collettivo mantiene una propria ricerca artistica autonoma, ma
            sceglie di metterla in dialogo con quella degli altri, sperimentando forme di lavoro condiviso e
            processuale.</p>
        <p>Il collettivo progetta mostre, laboratori, eventi e momenti di confronto pubblico, usando lo spazio
            come laboratorio in cui testare idee, formati espositivi e dispositivi di relazione con chi lo attraversa.
            Si occupa di riattivare un luogo storico di Asti come presidio culturale, costruendo continuità nel
            tempo e radicamento nel territorio, senza rinunciare a uno sguardo aperto verso reti artistiche più
            ampie.</p>
    </section>
    <section class="p-9 w-full">
        <h1 class="mb-10">ARTISTƏ DI EO</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
            <?php if ($artists->have_posts()):
                while ($artists->have_posts()):
                    $artists->the_post(); ?>
                    <a href="<?php the_permalink(); ?>"
                        class="flex flex-col md:flex-row items-center gap-6 hover:opacity-80 transition">
                        <div class="rounded-full overflow-hidden w-48 h-48 shrink-0">
                            <?php the_post_thumbnail('medium', [
                                'class' => 'w-full h-full object-cover'
                            ]); ?>
                        </div>
                        <div class="flex flex-col">
                            <h3 class="text-xl font-bold"><?php the_title(); ?></h3>
                            <p class="text-sm opacity-70"><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </a>
                <?php endwhile; endif;
            wp_reset_postdata(); ?>
        </div>
    </section>
</main>


<?php get_template_part('parts/footer'); ?>