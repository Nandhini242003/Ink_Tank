<?php
require_once 'lib/config.php';

include('includes/header.php');

// Fetch all content sections in a single query for efficiency
$content_sections_data = $db->select_query("SELECT * FROM content_sections");
$content_sections = [];
if ($content_sections_data !== FALSE) {
    foreach ($content_sections_data as $section) {
        $content_sections[$section['section_name']] = $section;
    }
}

// Fetch all site settings in a single query
$site_settings_data = $db->select_query("SELECT setting_name, setting_value FROM site_settings"); // Changed from 'settings' to 'site_settings'
$settings = [];
if ($site_settings_data !== FALSE) {
    foreach ($site_settings_data as $row) {
        $settings[$row['setting_name']] = $row['setting_value'];
    }
}
?>
<section class="carousel-section">
    <ul class="slider" id="fullscreen-slider">
        <?php
        $banner = $db->select_query("SELECT * FROM banner_section WHERE is_active = 1 ORDER BY sort_order ASC");
        if ($banner !== FALSE) {
            foreach ($banner as $row) {
                ?>
                <li><img src="<?php echo htmlspecialchars($sitepath . $row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['alt_text']); ?>" /></li>
                <?php
            }
        }
        ?>
    </ul>
    <div class="banner-text">
        <?php if (isset($content_sections['main_intro'])) { ?>
            <h1><?php echo nl2br(htmlspecialchars($content_sections['main_intro']['heading'])); ?></h1>
        <?php } ?>
    </div>
</section>

<div class="content">
    <div class="wrapper">
        <div class="container">
            <?php if (isset($content_sections['main_intro'])) { ?>
                <h2 class="main-heading">
                    <?php echo nl2br(htmlspecialchars($content_sections['main_intro']['heading'])); ?>
                </h2>
                <div class="btn-container">
                    <div class="btn-pink"><?php echo htmlspecialchars($content_sections['main_intro']['button_text']); ?></div>
                </div>
            <?php } ?>
            
            <?php if (isset($content_sections['more_than_content'])) { ?>
                <h1 class="big-heading"><?php echo htmlspecialchars($content_sections['more_than_content']['heading']); ?></h1>
                <p class="sub-text">
                    <?php echo htmlspecialchars($content_sections['more_than_content']['sub_heading']); ?>
                </p>
            <?php } ?>
            
            <?php if (isset($content_sections['work_with'])) { ?>
                <h2 class="big-heading">
                    <?php echo htmlspecialchars($content_sections['work_with']['heading']); ?>
                </h2>
                <div class="btn-container">
                    <div class="btn-pink"><?php echo htmlspecialchars($content_sections['work_with']['button_text']); ?></div>
                </div>
            <?php } ?>
            
            <div class="img">
                <img src="images/divider.png" alt="divider" />
            </div>

            <?php
            $about = $db->select_query("SELECT * FROM about WHERE id = 1");
            if ($about !== FALSE && count($about) > 0) {
            ?>
                <h2 class="section-title"><?php echo htmlspecialchars($about[0]['title']); ?></h2>
                <div class="img">
                    <img src="<?php echo htmlspecialchars($sitepath . $about[0]['image']); ?>" alt="Why Ink Tank icon">
                </div>
                <p class="paragraph-text">
                    <?php echo htmlspecialchars($about[0]['content']); ?>
                </p>
            <?php
            }
            ?>
            <div class="content-expertise">
              <h2 class="section-title">Content Expertise</h2>
              <div class="expertise-icons">
                <ul>
                    <?php
                    $expertise = $db->select_query("SELECT * FROM content_expertise WHERE is_active = 1 ORDER BY sort_order ASC");
                    if ($expertise !== FALSE) {
                        foreach ($expertise as $row) {
                            ?>
                            <li>
                                <img src="images/bullet.png" alt="bullet" /><a href="<?php echo htmlspecialchars($row['expertise_url']); ?>"><?php echo htmlspecialchars($row['expertise_name']); ?></a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
                <a href="#" class="and-more">And more!</a>
              </div>
            </div>
            <div class="wrapper">
              <div class="content-services">
                <h1 class="big-heading">Services</h1>
                <ul class="service-list">
                    <?php
                    $services = $db->select_query("SELECT * FROM services WHERE is_active = 1 ORDER BY sort_order ASC");
                    if ($services !== FALSE) {
                        foreach ($services as $row) {
                            ?>
                            <li>
                                <img src="<?php echo htmlspecialchars($sitepath . $row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['service_title']); ?>" />
                                <h3 class="service-heading"><?php echo htmlspecialchars($row['service_title']); ?></h3>
                                <p class="service-subheading"><?php echo htmlspecialchars($row['service_subtitle']); ?></p>
                                <p class="service-text">
                                    <?php echo nl2br(htmlspecialchars($row['service_description'])); ?>
                                </p>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
              </div>
              <div class="img">
                <img src="images/divider.png" alt="divider" />
              </div>
              <section class="work">
                <h1 class="big-heading">Our Work</h1>
                <p class="work-heading">
                    We have a work with these companies
                </p>
                <ul class="work-list">
                    <?php
                    $portfolio = $db->select_query("SELECT * FROM portfolio WHERE is_active = 1 ORDER BY sort_order ASC");
                    if ($portfolio !== FALSE) {
                        foreach ($portfolio as $row) {
                            ?>
                            <li><img src="<?php echo htmlspecialchars($sitepath . $row['logo_path']); ?>" alt="<?php echo htmlspecialchars($row['company_name']); ?>"></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
              </section>
            </div>
            <div class="contact-container">
              <div class="contact-left">
                <h3 class="contact-heading">Address</h3>
                <p><?php echo nl2br(htmlspecialchars($settings['address'])); ?></p>
                <h3 class="contact-heading">Phone:</h3>
                <a href="tel:<?php echo htmlspecialchars($settings['phone_number']); ?>">
                  <p><?php echo htmlspecialchars($settings['phone_number']); ?></p>
                </a>
                <h3 class="contact-heading">Email:</h3>
                <a href="mailto:<?php echo htmlspecialchars($settings['email']); ?>">
                  <p><?php echo htmlspecialchars($settings['email']); ?></p>
                </a>
                <h3 class="contact-heading">Follow us on</h3>
                <div class="social-icons">
                  <a href="<?php echo htmlspecialchars($settings['facebook_url']); ?>"> <img src="images/facebook.png" alt="facebook"></a>
                  <a href="<?php echo htmlspecialchars($settings['twitter_url']); ?>"> <img src="images/twitter.png" alt="twitter"></a>
                  <a href="<?php echo htmlspecialchars($settings['googleplus_url']); ?>"> <img src="images/googleplus.png" alt="googleplus"></a>
                  <a href="<?php echo htmlspecialchars($settings['linkedin_url']); ?>"> <img src="images/linkedin.png" alt="linkedin"></a>
                </div>
              </div>
              <div class="contact-right">
                <h2 class="contact-title">Contact Us</h2>
                <form>
                  <input type="text" placeholder="Name" required>
                  <input type="email" placeholder="Email" required>
                  <input type="text" placeholder="Phone" required>
                  <textarea placeholder="What do you need help with?" required></textarea>
                  <button type="submit">SUBMIT</button>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>