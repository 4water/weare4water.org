weare4water.org
===============

Please list any issues with weare4water.org on the [Issues page](https://github.com/4water/weare4water.org/issues)

Developers
----------
Assuming you have a working knowledge of MAMP/WAMP/XAMP, address one of the issues on the Issues page as follows:

* 'Fork' the repository ([help](https://help.github.com/articles/fork-a-repo))
* Create a 'branch' and 'clone' this branch to your desktop development environment
* OS X: Open terminal, type 'sudo pico /etc/hosts' and add 'weare4water.org' to the line starting '127.0.0.1'
* OS X: Open httpd.conf and, replacing YOUR_PATH with the location to which you forked the repository, add:

        <VirtualHost *>
            DocumentRoot "YOUR_PATH"
            ServerName weare4water.org
        </VirtualHost>

* Copy the contents of wp-config-development-sample.php to wp-config-develompent.php
* Create a new MySQL database '4water_dev' - if default user 'root' with password 'root' doesn't have access to this database, modify wp-config-development.php accordingly
* Load weare4water.org in your browser - you can still see the live/production website at www.weare4water.org
* Create the content required to reproduce your target issue and test it's correction
* Once corrected commit your changes to your repository and submit a Pull Request for deployment to www.weare4water.org
