execute "apt-get update"

package "apache2"
package "php5"
package "mysql-server"
package "mysql-client"
package "php5-mysql"
package "php5-xdebug"
package "php-pear"

execute "a2enmod rewrite"

cookbook_file "/etc/apache2/sites-available/default" do
    source "apache-site"
end
service "apache2" do
    action :restart
end


bash "install_phpunit" do
    code <<-EOH
        pear upgrade PEAR
        pear config-set auto_discover 1
        pear install pear.phpunit.de/PHPUnit
    EOH
    not_if { File.exists?("/usr/bin/phpunit") }
end

bash "setup_databases" do
    cwd "/var/www"
    code <<-EOH
        mysql -uroot -e "CREATE DATABASE IF NOT EXISTS sgp; CREATE DATABASE IF NOT EXISTS test_sgp"
    EOH
end