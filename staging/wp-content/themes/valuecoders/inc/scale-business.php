<?php
$sectionNum = get_field("section-numbers");
if (isset($sectionNum["is_enabled"]) && $sectionNum["is_enabled"] == "yes"): ?>
<section class="section-numbers padding-t-50">
      <div class="container">
        <div class="top-section b-100">
          <?php echo $sectionNum["content"]; ?>
        </div>
<div class="number-row">

<?php if ($sectionNum["con-box"]) {
    foreach ($sectionNum["con-box"] as $block) {
        echo '<div class="number-col">';
        if ($block["image"]) {
            echo '<div class="card-image">' .
                vc_pictureElm($block["image"]) .
                "</div>";
        }
        echo "<h2>" . $block["percentage"] . "</h2>";
        echo '<div class="is-grey">' . $block["label"] . "</div>";
        echo $block["content"];
        if ($block["link"]) {
            echo '<a class="is-arrow" href="' .
                vc_siteurl($block["link"]) .
                '">Learn More</a>';
        }
        echo "</div>";
    }
} ?>
        </div>
      </div>
    </section>

    <?php endif; ?>
