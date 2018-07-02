<footer id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <h2 class="u-textCenter">How can I help with your project?</h2>
                <form id="contact-form">
                    <input class="form-control" name="name" type="text" id="name" tabindex="1" placeholder="Name" />
                    <input class="form-control" name="email" type="text" id="email" tabindex="2" placeholder="Email" />
                    <textarea class="form-control" name="message" id="message" rows="5" tabindex="3" placeholder="Tell me about your project"></textarea>
                    <a class="contactSubmit" href="javascript:void(0);" onclick="jason.contactSubmit()">Let’s get started</a>
                </form>
            </div>
        </div>

        <?php wp_footer(); ?>
    </div>
</footer>

</body>
</html>