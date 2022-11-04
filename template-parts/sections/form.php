<script>
    $(document).ready(function () {
        $(".myclass").keypress(function (event) {
            var inputValue = event.charCode;
            if (!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) {
                event.preventDefault();
            }
        });

    });
</script>

<section class=" form wrapper ">
    <div class="container-boxed flex column">

        <?php
        $title = get_sub_field('title');
        if (!empty($title)): ?>
            <h2 class="general xs-text-start text-center"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php
        if (get_sub_field('form_format') == 1):
            $featured_posts = get_sub_field('forms');

            if ($featured_posts):

                ?>
                <div class="">
                    <?php foreach ($featured_posts as $p):

                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($p);

                        ?>
                        <div class="flex flex-wrap justify-center  flex-xs-column">

                            <?php
                            $cf7_id = $p->ID;
                            echo do_shortcode('[contact-form-7 id="' . $cf7_id . '" ]');
                            ?>

                        </div>
                    <?php
                    endforeach; ?>
                </div>
                <?php
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata();
                ?>

            <?php endif; ?>
        <?php else:
            $featured_posts2 = get_sub_field('forms_2');

            if ($featured_posts2): ?>
                <div class="">
                    <?php foreach ($featured_posts2 as $p):

                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($p);

                        ?>
                        <div class="flex flex-wrap justify-center  flex-xs-column">
                            <?php
                            $wpforms_id = $p->ID;
                            echo do_shortcode('[wpforms  id="' . $wpforms_id . '" ]');
                            ?>
                        </div>

                    <?php
                    endforeach; ?>
                </div>
                <?php
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata(); ?>
            <?php else: ?>
                <!-- Begin Mailchimp Signup Form -->

                <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">

                <style type="text/css">

                    #mc_embed_signup {
                        background: #fff;
                        clear: left;
                        font: 14px Helvetica, Arial, sans-serif;
                    }

                    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.

                       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */

                </style>

                <style type="text/css">

                    #mc-embedded-subscribe-form input[type=checkbox] {
                        display: inline;
                        width: auto;
                        margin-right: 10px;
                    }

                    #mergeRow-gdpr {
                        margin-top: 20px;
                    }

                    #mergeRow-gdpr fieldset label {
                        font-weight: normal;
                    }

                    #mc-embedded-subscribe-form .mc_fieldset {
                        border: none;
                        min-height: 0px;
                        padding-bottom: 0px;
                    }

                </style>

                <div id="mc_embed_signup">

                    <form action="https://itsartlaw.us2.list-manage.com/subscribe/post?u=78692bfa901c588ea1fe5e801&id=022731d685"
                          method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                          class="validate" target="_blank" novalidate="">

                        <div id="mc_embed_signup_scroll">

                            <h2>Subscribe</h2>

                            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>

                            <div class="mc-field-group">

                                <label for="mce-EMAIL">Email <span class="asterisk">*</span>

                                </label>

                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL"  placeholder="Please enter your email">

                            </div>

                            <div class="mc-field-group">

                                <label for="mce-MMERGE7">Organization <span class="asterisk">*</span>

                                </label>

                                <input type="text" value="" name="MMERGE7" class="required" id="mce-MMERGE7" placeholder="Organization">

                            </div>

                            <div class="mc-field-group">

                                <label for="mce-FNAME">First Name <span class="asterisk">*</span>

                                </label>

                                <input type="text" value="" name="FNAME" class="required myclass" id="mce-FNAME" placeholder="Please enter your first name">

                            </div>

                            <div class="mc-field-group">

                                <label for="mce-MMERGE8">Zip Code </label>

                                <input type="number" value="" name="MMERGE8" class="" id="mce-MMERGE8" placeholder="00000">

                            </div>

                            <div class="mc-field-group">

                                <label for="mce-LNAME">Last Name <span class="asterisk">*</span>

                                </label>

                                <input type="text" value="" name="LNAME" class="required myclass" id="mce-LNAME" placeholder="Please enter your surname">

                            </div>

                            <div class="mc-field-group">

                                <label for="mce-MMERGE6">Country </label>

                                <input type="text" value="" name="MMERGE6" class="myclass" id="mce-MMERGE6" placeholder="Country">

                            </div>

                            <div class="mc-field-group select">

                                <label for="mce-MMERGE5">Occupation <span class="asterisk">*</span>

                                </label>

                                <select name="MMERGE5" class="required" id="mce-MMERGE5" placeholder="Occupation">
                                    <option class="placeholder" value="" disabled selected hidden> Please select from dropdown below</option>
                                    <option value=""></option>

                                    <option value="Appraiser">Appraiser</option>

                                    <option value="Art Consultant">Art Consultant</option>

                                    <option value="Artist">Artist</option>

                                    <option value="Attorney">Attorney</option>

                                    <option value="Dealer">Dealer</option>

                                    <option value="Gallerist">Gallerist</option>

                                    <option value="Student">Student</option>

                                    <option value="Other">Other</option>


                                </select>

                            </div>


                            <div class="mc-field-group select">

                                <label for="mce-MMERGE4">How did you hear about Center for Art Law? <span class="asterisk-none">*</span></label>

                                <select name="MMERGE4" class="" id="mce-MMERGE4">
                                    <option class="placeholder" value="" disabled selected hidden> Please select from dropdown below</option>
                                    <option value=""></option>

                                    <option value="Internet search">Internet search</option>

                                    <option value="Center for Art Law event">Center for Art Law event</option>

                                    <option value="Networking">Networking</option>

                                    <option value="Social media">Social media</option>

                                    <option value="Other">Other</option>


                                </select>

                            </div>

                            <div class="mc-field-group input-group email-format">

                                <strong>Email Format </strong>

                                <ul>
                                    <li><input type="radio" value="html" name="EMAILTYPE" id="mce-EMAILTYPE-0"><label
                                                for="mce-EMAILTYPE-0">html</label></li>

                                    <li><input type="radio" value="text" name="EMAILTYPE" id="mce-EMAILTYPE-1"><label
                                                for="mce-EMAILTYPE-1">text</label></li>

                                </ul>

                            </div>

                            <p class="mailchimp">Powered by <a href="http://eepurl.com/gPX1Oz"
                                                               title="MailChimp - email marketing made easy and fun">MailChimp</a>
                            </p>

                            <div id="mergeRow-gdpr"
                                 class="mergeRow gdpr-mergeRow content__gdprBlock mc-field-group marketing-permissions ">

                                <div class="content__gdpr">

                                    <label>Marketing Permissions</label>

                                    <p>Center for Art Law will use the information you provide on this form to be in
                                        touch with you and to provide updates and marketing. Please let us know all the
                                        ways you would like to hear from us:</p>

                                    <fieldset class="mc_fieldset gdprRequired mc-field-group checkbox-inner"
                                              name="interestgroup_field">


                                        <label class="checkbox subfield" for="gdpr_1">
                                            <input type="checkbox" id="gdpr_1"
                                                   name="gdpr[1]" value="Y"
                                                   class="av-checkbox ">
                                            <span>Email</span>
                                        </label>

                                        <label class="checkbox subfield" for="gdpr_5">
                                            <input type="checkbox"
                                                   id="gdpr_5"
                                                   name="gdpr[5]"
                                                   value="Y"
                                                   class="av-checkbox ">
                                            <span>Direct Mail</span>
                                        </label><label class="checkbox subfield" for="gdpr_9">
                                            <input type="checkbox"
                                                   id="gdpr_9"
                                                   name="gdpr[9]"
                                                   value="Y"
                                                   class="av-checkbox ">
                                            <span>Customized online advertising</span>
                                        </label>

                                    </fieldset>

                                    <p>You can change your mind at any time by clicking the unsubscribe link in the
                                        footer of any email you receive from us, or by contacting us at
                                        artlawteam@itsartlaw.com. We will treat your information with respect. For more
                                        information about our privacy practices please visit our website. By clicking
                                        below, you agree that we may process your information in accordance with these
                                        terms.</p>

                                </div>

                                <div class="content__gdprLegal">

                                    <p>We use Mailchimp as our marketing platform. By clicking below to subscribe, you
                                        acknowledge that your information will be transferred to Mailchimp for
                                        processing. <a href="https://mailchimp.com/legal/" target="_blank"
                                                       rel="noopener noreferrer">Learn more about Mailchimp's privacy
                                            practices here.</a></p>

                                </div>

                            </div>

                            <div id="mce-responses" class="clear">

                                <div class="response" id="mce-error-response" style="display:none"></div>

                                <div class="response" id="mce-success-response" style="display:none"></div>

                            </div>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->

                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text"
                                                                                                      name="b_78692bfa901c588ea1fe5e801_022731d685"
                                                                                                      tabindex="-1"
                                                                                                      value=""></div>

                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe"
                                                      id="mc-embedded-subscribe" class="button"></div>

                        </div>

                    </form>

                </div>


                <!--End mc_embed_signup-->
            <?php endif; ?>
        <?php endif; ?>


    </div>
</section>