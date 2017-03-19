<body>
<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-wrap">
                            <table  cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="aligncenter">
                                        <?= $this->Html->image('/images/logo-transparent.png'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <h3>Welcome To Asahi Service Company</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Dear <?= $name ?>, You Have been given Access to the company website with available Apartment Listings with us. Hope we can help you for apartment that fits with your criteria.<br/>Here are the credentials for your account.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        USERNAME : <?= $username ?><br/>
                                        PASSWORD : <?= $password ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Your Account credentials are valid for <?= $validity ?> days.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block aligncenter">
                                        <a href="http://www.ur-net.lcl" class="btn-primary">Start Looking for apartments</a>
                                    </td>
                                </tr>
                              </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
</body>