<?php
get_template_part('parts/header');
?>

<main class="flex flex-col justify-center items-center h-screen">

    <div class="flex flex-col gap-4">
        <!-- Primary + Secondary Buttons -->
        <div>
            <p>Primary + Secondary</p>
            <?php
            echo primary_button('Button', '#', '');
            echo secondary_button('Button', '#', '');
            ?>
        </div>

        <!-- Primary Outline Buttons -->
        <div>
            <p>Primary Outline</p>
            <div>1: <?php
            echo primary_outline_button('Button', '#', '');

            ?></div>
            <div>2: <?php

            echo primary_outline_button_alt('Button', '#', '');
            ?></div>

        </div>

        <!-- Secondary Outline Buttons -->
        <div>
            <p>Secondary Outline</p>
            <div>1:
                <?php
                echo secondary_outline_button('Button', '#', '');

                ?>
            </div>
            <div>2:
                <?php

                echo secondary_outline_button_alt('Button', '#', '');
                ?>
            </div>

        </div>

        <!-- Shadow Buttons -->
        <div>
            <p>Shadow Buttons</p>
            <div class="mb-4">
                <?php
                echo primary_shadow_button('Button', '#', '');

                ?>
            </div>

            <div>
                <?php

                echo secondary_shadow_button('Button', '#', '');
                ?>
            </div>

        </div>

    </div>
    </div>


</main>

<?php
get_template_part('parts/footer');
?>