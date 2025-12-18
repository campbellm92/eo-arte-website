<?php
if (!defined('ABSPATH')) {
    exit;
}

get_template_part('parts/header');

if (have_posts()):
    while (have_posts()):
        the_post();
        ?>
        <!-- <main class="min-h-screen w-full p-9 mt-24">
            <div class="flex flex-col gap-12">
                <div class="flex flex-col text-center md:text-left shrink-0">
                    <div class="rounded-full overflow-hidden w-[20rem] h-[20rem] mb-6">
                        <?php the_post_thumbnail('medium', [
                            'class' => 'w-full h-full object-cover'
                        ]); ?>
                    </div>
                </div>
                <section class="prose max-w-none">
                    <h3 class="mb-5"><?php the_title(); ?></h3>
                    <div class="max-w-8/12">
                        <?php the_content(); ?>
                    </div>
                    <h3 class="my-5">Link</h3>
                    <a href="">Sito portfolio</a>
                    <br>
                    <a href="">Scaricare profile (pdf)</a>
                </section>
            </div>
        </main> -->



        <main class="min-h-screen w-full mt-24 flex justify-center">
            <div class="w-full max-w-4xl p-9 flex flex-col gap-12 items-center text-center">

                <!-- IMAGE -->
                <div class="rounded-full overflow-hidden w-[20rem] h-[20rem]">
                    <?php the_post_thumbnail('medium', [
                        'class' => 'w-full h-full object-cover'
                    ]); ?>
                </div>

                <!-- CONTENT -->
                <section class="prose prose-center max-w-none prose-p:text-justify hyphens-auto">
                    <h3 class="mb-5"><?php the_title(); ?></h3>

                    <?php the_content(); ?>

                    <h3 class="my-5">Link</h3>

                    <a href="" class="block">Sito portfolio</a>
                    <a href="" class="block">Scaricare profile (pdf)</a>
                </section>

            </div>
        </main>


        <?php
    endwhile;
endif;

get_template_part('parts/footer');
