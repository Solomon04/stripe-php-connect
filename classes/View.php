<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/23/2018
 * Time: 11:17 AM
 */

class View
{
    public $user;

    /**
     * View constructor.
     */
    public function __construct()
    {
        $connect = new StripeConnect();
        $this->user = $connect->getUser(1); //TODO: Set This To Your Session ID
    }

    /**
     * HTML Header
     * @return string
     */
    public function renderHeader()
    {
        return "<html lang=\"en\">
                  <head>
                    <meta charset=\"utf-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
                    <meta name=\"description\" content=\"\">
                    <meta name=\"author\" content=\"\">
                    <link rel=\"icon\" href=\"https://dashboard.stripe.com/favicon.ico\">
                
                    <title>Stripe Connect</title>
                
                    <!-- Bootstrap core CSS -->
                    <link href=\"https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
                
                    <!-- Custom styles for this template -->
                    <link href=\"cover.css\" rel=\"stylesheet\">
                  </head>";
    }

    /**
     * HTML Body
     * @return string
     */
    public function renderBody()
    {
        $navbar = $this->renderNavBar();
        $main = $this->renderMain($this->user['stripe_id']);
        $footer = $this->renderFooter();
        $script = $this->renderScript();
        return "<body class=\"text-center\">
                    <div class=\"cover-container d-flex h-100 p-3 mx-auto flex-column\">
                        $navbar
                        $main
                        $footer
                    </div>
                $script
                </body>
                </html>";

    }

    /**
     * HTML Navbar
     * @return string
     */
    private function renderNavBar()
    {
        return "<header class=\"masthead mb-auto\">
                <div class=\"inner\">
                    <h3 class=\"masthead-brand\">Stripe Connect</h3>
                    <nav class=\"nav nav-masthead justify-content-center\">
                        <a class=\"nav-link active\" href=\"#\">Home</a>
                    </nav>
                </div>
              </header>";
    }

    /**
     * HTML Main Content
     * @param $stripe_id
     * @return string
     */
    private function renderMain($stripe_id)
    {
        if(!empty($stripe_id)){
            return $this->renderLoginMain();
        } else{
            return $this->renderSignupMain();
        }
    }

    /**
     * Render Main Content if stripe_id isn't null
     * @return string
     */
    private function renderLoginMain()
    {
        return "<main role=\"main\" class=\"inner cover\">
                    <h1 class=\"cover-heading\">Your Connected!</h1>
                    <p class=\"lead\">Click Login to Access Your Account</p>
                    <p class=\"lead\">
                        <a href=\"?login=1\" class=\"btn btn-lg btn-secondary\">Login</a>
                    </p>
                </main>";
    }

    /**
     * Render Main Content if stripe_id is null
     * @return string
     */
    private function renderSignupMain()
    {
        return "<main role=\"main\" class=\"inner cover\">
                    <h1 class=\"cover-heading\">Your Not Connected!</h1>
                    <p class=\"lead\">Click Signup to Create Your Account</p>
                    <p class=\"lead\">
                        <a href=\"?signup=1\" class=\"btn btn-lg btn-secondary\">Signup</a>
                    </p>
                </main>";
    }

    /**
     * HTML Footer
     * @return string
     */
    private function renderFooter()
    {
        return "<footer class=\"mastfoot mt-auto\">
                    <div class=\"inner\">
                      <p>Cover template for <a href=\"https://getbootstrap.com/\">Bootstrap</a>, by <a href=\"https://twitter.com/mdo\">@mdo</a>.</p>
                    </div>
                  </footer>";
    }

    /**
     * HTML Scripts
     * @return string
     */
    private function renderScript()
    {
        return "<script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"></script>
                <script>window.jQuery || document.write('<script src=\"https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js\"><\/script>')</script>
                <script src=\"https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js\"></script>
                <script src=\"https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js\"></script>";
    }
}