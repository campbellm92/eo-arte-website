<?php
/**
 * Expects:
 * $args['sections'] = [
 *   [
 *     'title' => '',
 *     'content' => '',
 *     'align' => 'left' | 'right'
 *   ]
 * ];
 */

// Extract sections from $args
$sections = $args['sections'] ?? [];

if (empty($sections))
    return;
?>

<main class="min-h-screen w-full pt-40">
    <div class="mx-auto w-full px-10">

        <?php foreach ($sections as $section): ?>

            <section class="grid grid-cols-12 gap-6 mb-18">
                <div class="
                        col-span-12
                        <?= $section['align'] === 'right'
                            ? 'md:col-span-9 md:col-start-6 md:text-right'
                            : 'md:col-span-7'
                            ?>
                    ">
                    <h1 class="pb-5">
                        <?= esc_html($section['title']); ?>
                    </h1>

                    <div class="<?= $section['align'] === 'right' ? 'md:ml-auto' : '' ?>">
                        <?= wp_kses_post($section['content']); ?>
                    </div>
                </div>
            </section>

        <?php endforeach; ?>

    </div>
</main>