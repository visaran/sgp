execute "apt-get update"

package "apache2"
package "php5"
package "mysql-server"
package "mysql-client"
package "php5-mysql"
package "php-pear"

execute "a2enmod rewrite"

cookbook_file "/etc/apache2/sites-available/default" do
  source "apache-site"
end
service "apache2" do
  action :restart
end


execute "pear upgrade PEAR"
execute "pear config-set auto_discover 1"
execute "pear install pear.phpunit.de/PHPUnit"
execute "pecl install xdebug"